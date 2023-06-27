<?php
  
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Twilio\Rest\Client;

class TwilioSMSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    { 

        $receiver_number = "whatsapp:+917812880655";
        $body = "HI!,This is  a Laravel Whatsapp Notification";
        $sid = env('TWILIO_AUTH_SID'); //"AC2768789aac7115ad99bd537412f79628"
        $token = env('TWILIO_AUTH_TOKEN'); //"bc62b0e44e7327f852ebafaa43e79a61"
        $from =env('TWILIO_WHATSAPP_FROM'); // "whatsapp:+14155238886"

        // dd($receiver_num);
        $CLIENT = new Client($sid,$token);
        // dd($CLIENT);
        $sent = $CLIENT->messages->create($receiver_number,[
            'from'=>$from,
            'body'=>$body
        ]);

           
       
        $receiverNumber = "+917812880655" ;

        $message = "This is testing from Ocean Softwares ..";
        
        try {
  
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");
            
            $client = new Client($account_sid, $auth_token);
            
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number, 
                'body' => $message]);
  
            dd('SMS Sent Successfully') ;
  
        } catch (Exception $e) {
            dd("Error: ". $e->getMessage());
        }


    }
}