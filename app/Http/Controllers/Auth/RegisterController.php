<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Mail\RegisterMail;
use Twilio\Rest\Client;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        Mail::to('gowthamsakthi2520@gmail.com')->send(new RegisterMail($data));
        $receiver_num = "+917812880655";
        $body = "name ".$data['name']."Email ".$data['email'];
        $twilio_sid = env('TWILIO_SID');
        $twilio_token = env('TWILIO_TOKEN');
        $twilio_from = env('TWILIO_FROM');

        $client = new Client($twilio_sid,$twilio_token);
        $client->messages->create($receiver_num,[
            'from'=>$twilio_from,
            'body'=>$body
        ]);

        $receiver_number = "whatsapp:+917812880655";
        $mess = "Whatsapp Notification Sent".$data['email'];

        $sid = env('TWILIO_AUTH_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_AUTH_FROM');
        
        $new = new Client($sid,$token);
        $new->messages->create("whatsapp:+917812880655",[
            'from'=>"whatsapp:+14155238886",
            'body'=>$mess
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
