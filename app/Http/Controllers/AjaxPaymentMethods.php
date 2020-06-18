<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\UserPaymentMethods;
use App\Service\ReepayPaymentService;
use Illuminate\Support\Facades\Auth;

class AjaxPaymentMethods extends Controller
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

    public function addPaymentMethod(Request $request)
    {
        $paymentMethodId = $request->get('paymentId');
        $customerHandler = $request->get('customerHandler');
        /** @var User $user */
        $user = Auth::user();

        if ($paymentMethodId && $customerHandler) {
            $response = $this->getPaymentMethodData($customerHandler);

            if ($response->getStatusCode() === 200) {
                $cards = json_decode($response->getBody()->getContents(), true)['cards'];

                foreach ($cards as $card) {
                    if($card['id'] !== $paymentMethodId) {
                        continue;
                    }

                    if ($user->paymentMethods->where('handler', $card['id'])->count()) {
                        continue;
                    }

                    $paymentMethod = new UserPaymentMethods();
                    $paymentMethod->user_id = $user->id;
                    $paymentMethod->handler = $card['id'];
                    $paymentMethod->masked_card = $card['masked_card'];
                    $paymentMethod->card_type = $card['card_type'];
                    $paymentMethod->exp_date = $card['exp_date'];

                    $paymentMethod->save();
                }
            }

            try {
                $createSubscription = $this->reepayPaymentService->createCustomerSubscription();
            } catch (\Exception $exception) {
                return response()->json(['success' => false], 404);
            }
    
            if ($createSubscription) {
                return response()->json(['success' => false], 200);
            }
            
            return response()->json('success');
        }
    }

    public function dummy(Request $request)
    {
        $paymentMethodId = $request->get('paymentId');
        $customerHandler = $request->get('customerHandler');
        /** @var User $user */
        $user = Auth::user();

        if ($paymentMethodId && $customerHandler) {
            $response = $this->getPaymentMethodData($customerHandler);

            if ($response->getStatusCode() === 200) {
                $cards = json_decode($response->getBody()->getContents(), true)['cards'];

                foreach ($cards as $card) {
                    if($card['id'] !== $paymentMethodId) {
                        continue;
                    }

                    if ($user->paymentMethods->where('handler', $card['id'])->count()) {
                        continue;
                    }

                    $paymentMethod = new UserPaymentMethods();
                    $paymentMethod->user_id = $user->id;
                    $paymentMethod->handler = $card['id'];
                    $paymentMethod->masked_card = $card['masked_card'];
                    $paymentMethod->card_type = $card['card_type'];
                    $paymentMethod->exp_date = $card['exp_date'];

                    $paymentMethod->save();
                }
            }
        }
    }

    private function getPaymentMethodData($customerHandler)
    {
        return $this->reepayPaymentService->invoke(
            ReepayPaymentService::GET_TYPE,
            'https://api.reepay.com/v1/customer/' . $customerHandler . '/payment_method',
            [
                'handle' => $customerHandler,
            ]
        );
    }
}
