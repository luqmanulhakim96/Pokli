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
     public $result;


     public function __construct($result)
     {
       $this->$result = $result;
         // dd($this);
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       dd($this->result);
       return $this->to($this->result->customer->email, $this->result->customer->first_name)
               ->from(env('SHOP_MAIL_FROM'))
               ->subject(trans('shop::app.mail.myuncang-purchase-invoice.subject'))
               ->view('shop::emails.sales.new-purchase-invoice');
     }
}
