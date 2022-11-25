<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Reservation;
use App\Models\Transaction;

class PayPalController extends Controller
{
    public function index(Request $request){
        $reservation = Reservation::where('id', $request->reservation);
        if(!$reservation->first()) return redirect()->back()->with(['status' => 404]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());
        $provider->setCurrency('USD');
        
        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $reservation->first()->total,
                    ]
                ],
            ],
            'application_context' => [
                'cancel_url' => route('paypal.cancel'),
                'return_url' => route('paypal.capture'),
            ],
        ]);
        if($order['status'] == 'CREATED'){
            Transaction::create([
                'reservation_id' => $reservation->first()->id,
                'provider' => 'PayPal',
                'token' => $order['id'],
            ]);
            return redirect()->back()->with([
                'status' => 200,
                'url' => $order['links'][1]['href'],
            ]);
        }
        return redirect()->back()->with([
            'status' => 500,
            'message' => 'Failed to Pay!'
        ]);
    }

    public function capture(Request $request){
        $transaction = Transaction::where('token', $request->token);
        if(!$transaction->first()) return redirect()->route('welcome')->with([
            'status' => 404,
            'message' => 'Reservation not found!',
        ]);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->setAccessToken($provider->getAccessToken());

        $capture = $provider->capturePaymentOrder($request->token);
        if(@$capture['status'] == 'COMPLETED'){
            $transaction->update([
                'payer' => $request->PayerID
            ]);
            Reservation::where('id', $transaction->first()->reservation_id)->update([
                'paye' => 1
            ]);
            // $reservation = Reservation::where('id', $transaction->first()->reservation_id)->get();
            return redirect()->route('welcome')->with([
              //  'id' => 1 , // la premiere reservation pour tester
                'status' => 200,
                'message' => 'Thank You for your purchase!'
            ]);
        }
        return redirect()->route('welcome')->with([
            'status' => 500,
            'message' => 'Failed to pay!'
        ]);
    }

    public function cancel(Request $request){
        Transaction::where('token', $request->token)->delete();
        return redirect()->route('welcome')->with([
            'status' => 500,
            'message' => 'Failed to Pay!',
        ]);
    }
}
