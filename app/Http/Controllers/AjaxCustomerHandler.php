<?php

namespace App\Http\Controllers;

use App\Service\ReepayPaymentService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxCustomerHandler extends Controller
{
    /**
     * @var ReepayPaymentService
     */
    private $reepayPaymentService;

    public function __construct(
        ReepayPaymentService $reepayPaymentService
    ) {
        $this->middleware('auth');
        $this->reepayPaymentService = $reepayPaymentService;
    }

    public function addCustomerHandler(Request $request)
    {
        $customerHandler = $request->post('customerHandler');

        if ($customerHandler) {
            /** @var User $user */
            $user = Auth::user();

            if (!$user->payment->customer_handler) {
                $user->payment->customer_handler = $customerHandler;
                $user->payment->save();
            }
        }
    }
}
