<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Service\ReepayPaymentService;

class AjaxGetSubscriptions extends Controller
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
        return View::make('dashboard.ajax.subscriptions')
            ->with([
                'subscriptions' => Subscription::where('user_id', Auth::id())->get(),
                'customerSession' => $this->paymentService->getCustomerSession()
            ])
            ->render();
    }
}
