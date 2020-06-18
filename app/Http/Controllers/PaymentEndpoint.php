<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Subscription;
use Illuminate\Http\Request;
use Silvanite\Brandenburg\Role;
use App\Service\ReepayPaymentService;

class PaymentEndpoint extends Controller
{
    /**
     * @var ReepayPaymentService
     */
    private $reepayPaymentService;

    public function __construct(
        ReepayPaymentService $reepayPaymentService
    ) {
        $this->reepayPaymentService = $reepayPaymentService;
    }

    public function execute(Request $request) {

        if ($request->method() !== 'POST') {
            return response()->json(['message' => 'Not the right method'], 500);
        }

        $requestData = $request->all();
        $id = $requestData['id'];
        $timestamp = $requestData['timestamp'];
        $webHookSignature = $requestData['signature'];
        $eventType = $requestData['event_type'];

        $serverSignature = $this->calculateWebhookSignature($timestamp, $id);

        if ($webHookSignature !== $serverSignature) {
            return response()->json(['message' => 'Signature does not match'], 500);
        }
        switch ($eventType) {
            case 'invoice_created': {
                if(!$this->invoiceCreated($requestData['invoice'])) {
                    return response()->json(['message' => 'Error when trying to create invoice'], 500);
                }
            }
            case 'invoice_settled': {
                if(!$this->invoiceSettled($requestData['subscription'])) {
                    return response()->json(['message' => 'Error when trying to change subscription'], 500);
                }

            }
        }

        return response()->json(['message' => 'Success'], 200);
    }

    /**
     * @param $timestamp
     * @param $id
     * @return string
     */
    private function calculateWebHookSignature($timestamp, $id)
    {
        return hash_hmac('sha256', $timestamp . $id, env('REEPAY_WEBHOOK_SECRET'));
    }

    private function invoiceSettled($subscription)
    {
        $subscription = Subscription::where('subscription_id', $subscription)->first();

        if (!$subscription) {
            return false;
        }

        $subscription->status = Subscription::STATUS_ACTIVE;
        $subscription->save();

        $user = $subscription->user;

        $user->removeRole(Role::where('slug', 'unsubscribed-member')->first());
        $user->assignRole(Role::where('slug', 'subscriber')->first());

        return true;
    }

    public function dummyInvoice()
    {
        $response = $this->reepayPaymentService->getInvoice('inv-69');

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        $invoiceData = \json_decode($response->getBody()->getContents());

        dd($invoiceData);

        $invoice = new Invoice();
        $invoice->handle = $invoiceData->handle;
        $invoice->status = Invoice::STATUS_OPEN;
        $invoice->user_id = 1;
        $invoice->subscription_id = 1;
        $invoice->amount = $invoiceData->amount;
        $invoice->amount_ex_vat = $invoiceData->amount_ex_vat;
        $invoice->amount_vat = $invoiceData->amount_vat;
        $invoice->currency = $invoiceData->currency;
        $invoice->created = new \DateTime($invoiceData->created);

        $invoice->save();

//        foreach ($invoiceData->order_lines as $items) {

//        }

        dump($invoiceData);
    }

    public function invoiceCreated($invoiceId)
    {
        $response = $this->reepayPaymentService->getInvoice($invoiceId);

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        $invoiceData = \json_decode($response->getBody()->getContents());

        $invoice = new Invoice();
        $invoice->handle = $invoiceData->handle;
        $invoice->status_id = Invoice::STATUS_OPEN;
        $invoice->user_id = 1;
        $invoice->subscription_id = 2;
        $invoice->amount = $invoiceData->amount;
        $invoice->amount_ex_vat = $invoiceData->amount_ex_vat;
        $invoice->amount_vat = $invoiceData->amount_vat;
        $invoice->currency = $invoiceData->currency;
        $invoice->created = new \DateTime($invoiceData->created);

        $invoice->save();

        return true;
    }
}
