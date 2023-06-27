<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Razorpay\Api\Api;
use Exception;
use Log;
use App\Mail\PaymentMail;
use Mail;

class RazorpayController extends Controller
{
    public function payment_handler(){

        try{
            return view('backend.create_payment');
        }
        catch(Exception $e){
            return back()->with('error',$e->getMessage())->withInput();
        }
    }

    public function handlePayment(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture([
                    'amount' => $payment['amount']
                ]);
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $response['amount'] / 100,
                //     'json_response' => json_encode((array)$response)
                ]);
             Mail::to($payment['user_email'])->cc('gowthamsakthi2520@gmail.com')->send(new PaymentMail($payment));
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return back()->withError($e->getMessage());
            }
        }
        return back()->withSuccess('Payment Successful.');
    }
}
