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
     public $history;


     public function __construct($purchase)
     {
       $this->history = $history;

     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       return $this->to($this->history->customer_email, $this->history->customer_full_name)
               ->from(env('SHOP_MAIL_FROM'))
               ->subject(trans('shop::app.mail.order.subject'))
               ->view('shop::emails.sales.new-order');
     }
}
