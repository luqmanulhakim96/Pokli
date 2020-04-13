<?php

namespace Artanis\AdminCustom\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBuybackGAPSAPInvoiceNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $buyback;


     public function __construct($buyback)
     {
       $this->buyback = $buyback;
         // dd($this);
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       // dd($this->buyback);
       return $this->to($this->buyback->customer->email, $this->buyback->customer->first_name)
               ->from(env('SHOP_MAIL_FROM'))
               ->subject(trans('shop::app.mail.myuncang-buyback-invoice.subject'))
               ->view('shop::emails.sales.new-buyback-invoice');
     }
}
