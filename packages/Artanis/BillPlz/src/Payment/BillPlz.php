<?php

namespace Artanis\BillPlz\Payment;
use Webkul\Payment\Payment\Payment;
use Billplz\Client;

class BillPlz extends Payment
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'billplz';

    private $billplz;

    public function __construct()
    {
        $this->billplz = Client::make(config('billplz.api_key'));
        $this->billplz->useVersion(config('billplz.version'));
        if (app()->environment() != "production") {
            $this->billplz->useSandbox();
        }
    }
    public static function make()
    {
        return (new self())->billplz;
    }

    public function getRedirectUrl()
    {
        return route('billplz.redirect');
    }

    public function getFormFields()
    {
        $cart = $this->getCart();
        $billingAddress = $cart->billing_address;
        $item = $this->getCartItems();

        $fields = [
            'collection_id'        => 'x7afhxzc',
            'email'                => $billingAddress->email,
            'name'                 => $billingAddress->first_name,
            'amount'               => $cart->grand_total,
            'callback_url'         => route('billplz.cancel'),
            'description'          => 'Testing API'
            'redirect_url'         => route('billplz.redirect'),
            'deliver'              => core()->getCurrentChannel()->name,
            'reference_1_label'    => 'Item : ',
            'reference_1'          => $item->name,
        ];

        return $fields;
    }
}
