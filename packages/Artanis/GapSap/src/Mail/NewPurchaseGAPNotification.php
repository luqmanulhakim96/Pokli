<?php

namespace Artanis\GapSap\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPurchaseGAPNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $purchase;


     public function __construct($purchase)
     {
       $this->purchase = $purchase;

     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       return $this->to($this->purchase->customer_email, $this->purchase->customer_full_name)
               ->from(env('SHOP_MAIL_FROM'))
               ->subject(trans('shop::app.mail.order.subject'))
               ->view('shop::emails.sales.new-order');
     }
}
