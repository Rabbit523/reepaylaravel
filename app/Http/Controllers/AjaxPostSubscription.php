<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\ReepayPaymentService;

class AjaxPostSubscription extends Controller
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

    public function execute(Request $request)
    {
        try {
            $createSubscription = $this->reepayPaymentService->createCustomerSubscription();
        } catch (\Exception $exception) {
            return response()->json(['success' => false], 404);
        }

        if ($createSubscription) {
            return response()->json(['success' => false], 200);
        }

        return response()->json(['success' => false], 404);
    }
}
