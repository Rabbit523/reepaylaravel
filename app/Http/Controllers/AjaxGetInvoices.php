<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Service\ReepayPaymentService;

class AjaxGetInvoices extends Controller
{
    /**
     * @var ReepayPaymentService
     */
    private $paymentService;

    public function __construct(
        ReepayPaymentService $paymentService
    ) {
        $this->middleware('auth');
        $this->paymentService = $paymentService;
    }

    public function execute()
    {
        $customer_handle = Auth::User()->payment->customer_handler ?? '0';
        $invoices = $this->paymentService->getInvoiceByCustomer($customer_handle);
        $invoices = json_decode($invoices->getBody()->getContents(), true);

        return View::make('dashboard.ajax.invoices')
            ->with([
                'invoices' => $invoices['content'],
                'customerSession' => $this->paymentService->getCustomerSession(),
            ])
            ->render();
    }

    public function detailInfo(Request $request) {
        // Using WebHook
        // Request ID: Webhook ID
        $list = $this->paymentService->getWebHook($request->id);
        return response()->json(['result' => $list]);
    }
}
