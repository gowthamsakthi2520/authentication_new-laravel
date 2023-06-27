<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $payment;
    public function __construct($payment)
    {
        $this->payment=$payment;
    }
    
    public function build(){
        return $this->subject('RazorPayment Test Notification')->view('email.payment_email',['payment'=>$this->payment]);
    }
}
