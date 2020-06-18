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
}
