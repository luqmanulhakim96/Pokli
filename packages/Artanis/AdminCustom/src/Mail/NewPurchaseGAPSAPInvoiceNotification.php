<?php

namespace Artanis\AdminCustom\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewPurchaseGAPSAPInvoiceNotification extends Mailable
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
       dd($this);
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       dd($this->purchase->customer->email);
       return $this->to($this->purchase->customer->email, $this->purchase->customer->first_name)
               ->from(env('SHOP_MAIL_FROM'))
               ->subject(trans('shop::app.mail.myuncang-purchase-invoice.subject'))
               ->view('shop::emails.sales.new-purchase-invoice');
     }
}
