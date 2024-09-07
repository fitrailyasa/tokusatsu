<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function payWithPayPal()
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "100.00"
                    ]
                ]
            ]
        ]);

        Log::info('PayPal create order response: ', $response);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        }

        return redirect()->route('paypal.status')->with('error', 'Something went wrong.');
    }

    public function payPalStatus(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $order_id = $request->query('token');

        Log::info('PayPal callback token: ', ['token' => $order_id]);

        if (!$order_id) {
            return redirect()->route('home')->with('error', 'Invalid payment token.');
        }

        $response = $provider->capturePaymentOrder($order_id);

        Log::info('PayPal capture order response: ', $response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Handle success - Order is completed
            return redirect()->route('home')->with('success', 'Transaction complete.');
        }

        return redirect()->route('home')->with('error', 'Something went wrong.');
    }
}
