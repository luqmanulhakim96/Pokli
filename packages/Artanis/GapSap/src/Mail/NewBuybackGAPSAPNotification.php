<?php

namespace Artanis\GapSap\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBuybackGAPSAPNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $history;


     public function __construct($history)
     {
       $this->history = $history;
         // dd($this);
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       // dd($this->history->customer->email);
       return $this->to($this->history->customer->email, $this->history->customer->first_name)
               ->from(env('SHOP_MAIL_FROM'))
               ->subject(trans('shop::app.mail.myuncang-buyback.subject'))
               ->view('shop::emails.sales.new-buyback');
     }
}
