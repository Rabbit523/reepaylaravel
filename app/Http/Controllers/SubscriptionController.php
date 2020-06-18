<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ReepayPaymentService;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * @var ReepayPaymentService
     */
    private $paymentService;

    public function __construct(
        ReepayPaymentService $paymentService
    ) {
        $this->paymentService = $paymentService;
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard/subscription')->with([
            'user' => Auth::user(),
            'customerSession' => $this->paymentService->getCustomerSession()
        ]);
    }
}
