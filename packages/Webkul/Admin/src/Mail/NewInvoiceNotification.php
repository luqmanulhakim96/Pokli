<?php

namespace Webkul\Admin\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * New Invoice Mail class
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class NewInvoiceNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The invoice instance.
     *
     * @var Invoice
     */
    public $invoice;

    /**
     * Create a new message instance.
     *
     * @param mixed $invoice
     * @return void
     */
    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = $this->invoice->order;
        $invoice = $this->invoice;
        // dd($invoice);

        $invoice = $this->invoiceRepository->findOrFail($invoice->id);
        $filename = 'invoice/invoice-' . $invoice->created_at->format('dmY H.m.s') . '.pdf';
        $serial_number = $invoice['order_id'];
        // dd($serial_number);
        // dd($shipment);
        // foreach ($order->items as $item){
        //   $product=$item->product_id;
        $where = ['order_id' => $serial_number];
        $serial_number= DB::table('product_serial_number')->where($where)->get();

        $pdf = PDF::loadView('admin::sales.invoices.pdf', compact('invoice','serial_number'))->setPaper('a4');
        Storage::put($filename, $pdf->output());

        return $this->to($order->customer_email, $order->customer_full_name)
                ->from(env('SHOP_MAIL_FROM'))
                ->subject(trans('shop::app.mail.invoice.subject', ['order_id' => $order->increment_id]))
                ->view('shop::emails.sales.new-invoice', compact('invoice'))
                ->attach('storage\app\public\invoice/invoice-' . $invoice->created_at->format('dmY H.m.s') . '.pdf');
    }
}
