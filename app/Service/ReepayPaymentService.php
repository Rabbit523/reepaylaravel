<?php

namespace App\Service;

use App\Invoice;
use App\Plan;
use App\Subscription;
use App\User;
use App\UserPayment;
use App\UserPaymentMethods;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Auth;
use DateTime;
class ReepayPaymentService
{
    CONST GET_TYPE = 'GET';
    CONST POST_TYPE = 'POST';
    CONST PUT_TYPE = 'PUT';
    CONST DELETE_TYPE = 'DELETE';

    private $reepayPublicKey;
    private $reepayPrivateKey;

    /** @var Client */
    private $client;

    public function __construct(
        Client $client
    )
    {
        $this->reepayPublicKey = env('REEPAY_PUBLIC_KEY');
        $this->reepayPrivateKey = env('REEPAY_PRIVATE_KEY');
        $this->client = $client;
    }

    public function invoke(string $method, string $url, array $data): Response
    {
        $curlOptions = [
            'headers' => [
                'Authorization' => 'Basic ' . $this->getApiKey(),
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ],
            'body' => json_encode($data)
        ];

        /** @var Response $response */
        $response = $this->client->request($method, $url, $curlOptions);


        return $response;
    }

    public function dummyOrder()
    {
        $data = [];

        /** @var User $user */
        $user = Auth::user();

        $data = array_merge($data, $this->createCustomer());

        $response = $this->invoke(self::POST_TYPE,
            'https://api.reepay.com/v1/subscription',
            [
                'plan' => 'plan-db6d9',
                'signup_method' => 'source',
                'customer' => $user->payment->customer_handler,
                'generate_handle' => true,
                'source' => $user->paymentMethods[0]->handler
            ]
        );

        dump($this->createCustomerSubscription(5));

        die();
    }

    /**
     * @param null $paymentMethodId
     * @return bool
     * @throws \Exception
     */
    public function createCustomerSubscription($paymentMethodId = null)
    {

        /** @var User $user */
        $user = Auth::user();
        $customerHandler = $user->payment->customer_handler;

        if ($paymentMethodId) {
            $paymentMethod = UserPaymentMethods::where('id', $paymentMethodId)->first();
        } else {
            $paymentMethod = UserPaymentMethods::where('user_id', $user->id)->first();
        }



        if (!$paymentMethod || $paymentMethod->user_id !== $user->id) {
            return false;
        }


        if (!$customerHandler) {
            return false;
        }


        $plan = Plan::where('is_default', true)->first();

        if (!$plan) {
            return false;
        }


        $response = $this->invoke(self::POST_TYPE,
            'https://api.reepay.com/v1/subscription',
            [
                'plan' => $plan->plan_id,
                'signup_method' => 'source',
                'customer' => $customerHandler,
                'generate_handle' => true,
                'source' => $paymentMethod->handler
            ]
        );

        $Invoices = $this->invoke(self::GET_TYPE, 'https://api.reepay.com/v1/invoice', []);

        if ($response->getStatusCode() !== 200) {
            return false;
        }

        $responseContent = json_decode($response->getBody()->getContents(), true);
        $invoicesContent = json_decode($Invoices->getBody()->getContents(), true);

        $subscription = new Subscription();
        $subscription->user_id = $user->id;
        $subscription->plan_id = $plan->id;
        $subscription->card_id = $paymentMethod->id;
        $subscription->status = Subscription::STATUS_PENDING;
        $subscription->subscription_id = $responseContent['handle'];
        $subscription->subscription_create = new \DateTime($responseContent['created']);
        $subscription->trial_end = new \DateTime($responseContent['trial_end']);
        $subscription->next_invoice = new \DateTime($responseContent['next_period_start']);
        $subscription->change_card_url = $responseContent['hosted_page_links']['payment_info'];

        $subscription->save();


        foreach ($invoicesContent as $item) {
            $invoice = new Invoice();
            $subscription->user_id = $user->id;
            $subscription->plan_id = $plan->id;
            $subscription->card_id = $paymentMethod->id;
            $subscription->status = Subscription::STATUS_PENDING;
            $subscription->subscription_id = $responseContent['handle'];
            $subscription->subscription_create = new \DateTime($responseContent['created']);
            $subscription->trial_end = new \DateTime($responseContent['trial_end']);
            $subscription->next_invoice = new \DateTime($responseContent['next_period_start']);
            $subscription->change_card_url = $responseContent['hosted_page_links']['payment_info'];
        }

        return true;
    }

    public function getInvoice($invoiceId)
    {
        return $this->invoke(self::GET_TYPE,
            'https://api.reepay.com/v1/invoice/' . $invoiceId,
            []
        );
    }

    public function getInvoices()
    {
        return $this->invoke(self::GET_TYPE,
            'https://api.reepay.com/v1/invoice',
            []
        );
    }

    public function getInvoiceByCustomer($customerId) 
    {
        return $this->invoke(self::GET_TYPE,
            'https://api.reepay.com/v1/invoice?search=customer.handle:' . $customerId,
            []
        );
    }
    /**
     * @return array
     */
    private function createCustomer(): array
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user) {
            return [];
        }

        return [
            'create_customer' => [
                'email' => $user->email,
                'address' => $user->address,
                'city' => $user->getCity->name,
                'country' => $user->country ?? 'DK',
                'phone' => $user->phone,
                'postal_code' => $user->postal_code,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'generate_handle' => true
            ]
        ];
    }

    /**
     * @return Response|null
     */
    private function createCustomerSession():? Response
    {
        /** @var Response $response */
        $response = $this->invoke(
            self::POST_TYPE,
            'https://checkout-api.reepay.com/v1/session/recurring',
            $this->createCustomer()
        );

        if ($response->getStatusCode() === 200) {
            return $response;
        }

        return null;
    }

    /**
     * @return string|null
     */
    public function getCustomerSession():? string
    {
        /** @var User $user */
        $user = Auth::user();

        if (!$user) {
            return null;
        }

        if (!$user->payment) {
            if (!$user->city
                || !$user->phone
                || !$user->postal_code
                || !$user->first_name
                || !$user->last_name
                || !$user->email
                || !$user->address
            ) {
                return null;
            }

            $handler = json_decode($this->createCustomerSession()->getBody()->getContents(), true)['id'];

            $userPayment = new UserPayment();
            $userPayment->user_id = $user->id;
            $userPayment->handler = $handler;
            $userPayment->customer_handler = null;
            $userPayment->save();

            return $handler;
        }

        return $user->payment->handler;
    }

    public function getWebHook($id) {
        return $this->invoke(self::GET_TYPE,
            'https://api.reepay.com/v1/webhook/' . $id,
            []
        );
    }
    /**
     * @return string
     */
    private function getApiKey()
    {
        return base64_encode($this->reepayPrivateKey . ':');
    }
}
