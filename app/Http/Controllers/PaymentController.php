<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    private $api = 'https://apihotel21-production.up.railway.app/api';

    public function pay($orderId)
    {
        $token = session('token');

        $usuario = session('usuario');

        $userId = $usuario['id_cliente'] ?? $usuario['id'] ?? null;

        if (!$userId) {

            return back()->with('error', 'Usuario no identificado');
        }

        $response = Http::withToken($token)
            ->get($this->api . "/orders/$userId/$orderId");

        if (!$response->successful()) {

            return back()->with('error', 'No se pudo obtener el pedido');
        }

        $order = $response->json();

        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $paypalOrder = $provider->createOrder([

            "intent" => "CAPTURE",

            "application_context" => [

                "return_url" => url('/payment/success/' . $orderId),

                "cancel_url" => url('/payment/cancel')
            ],

            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "MXN",
                        "value" => number_format($order['total'], 2, '.', '')
                    ]
                ]
            ]
        ]);

        if (isset($paypalOrder['id'])) {

            foreach ($paypalOrder['links'] as $link) {

                if ($link['rel'] == 'approve') {

                    return redirect($link['href']);
                }
            }
        }

        return back()->with('error', 'Error al conectar con PayPal');
    }

    public function success(Request $request, $orderId)
    {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (
            isset($response['status']) &&
            $response['status'] == 'COMPLETED'
        ) {

            $transactionId = $response['id'];

            $token = session('token');

            Http::withToken($token)
                ->put($this->api . "/orders/$orderId/payment", [

                    'transaction_id' => $transactionId,

                    'payment_status' => 'pagado',

                    'payment_date' => now()
                ]);

            return redirect('/orders')
                ->with('success', 'Pago realizado correctamente');
        }

        return redirect('/orders')
            ->with('error', 'Pago no completado');
    }

    public function cancel()
    {
        return redirect('/orders')
            ->with('error', 'Pago cancelado');
    }
}