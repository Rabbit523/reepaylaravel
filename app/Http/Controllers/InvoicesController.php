<?php

namespace App\Http\Controllers;

use App\Service\ReepayPaymentService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InvoicesController extends Controller
{

    /**
     * @var ReepayPaymentService
     */
    private $paymentService;

    public function __construct(ReepayPaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
        $this->middleware('auth');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard/invoices')->with([
            'user' => Auth::user(),
            'customerSession' => $this->paymentService->getCustomerSession()
        ]);
    }

    public function detail(Request $request) {
        $customer_handle = Auth::User()->payment->customer_handler ?? '0';
        $invoices = $this->paymentService->getInvoiceByCustomer($customer_handle);
        $invoices = json_decode($invoices->getBody()->getContents(), true);
        $data = [];
        foreach ($invoices['content'] as $invoice) {
            if ($invoice['id'] == $request->id) {
                $data = [
                    "invoice_id" => $invoice['id'],
                    "invoice_text" => $invoice['order_lines'][0]['ordertext'],
                    "invoice_amount" => $invoice['amount'],
                    "invoice_amount_ex_vat" => $invoice['amount_ex_vat'],
                    "invoice_amount_vat" => $invoice['amount_vat'],
                    "invoice_quantity" => 1,
                    "invoice_plan_id" => $invoice['plan'],
                    "invoice_state" => $invoice['state']
                ];
            }
        }
        return view('dashboard/invoice')->with([
            'user' => Auth::user(),
            'data' => $data
        ]);
    }
}
