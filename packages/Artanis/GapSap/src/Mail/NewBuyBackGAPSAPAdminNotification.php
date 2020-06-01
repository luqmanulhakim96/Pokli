<?php

namespace Artanis\GapSap\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewBuyBackGAPSAPAdminNotification extends Mailable
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
      return $this->to(env('ADMIN_MAIL_TO'))
              ->from(env('SHOP_MAIL_FROM'))
              ->subject(trans('shop::app.mail.myuncang-buyback-admin.subject'))
              ->view('shop::emails.sales.new-buyback-admin');
    }
}
