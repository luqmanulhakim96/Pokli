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
        $this->billplz = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg');
        $this->billplz->useSandbox();
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
            'description'          => 'Testing API',
            'redirect_url'         => route('billplz.redirect'),
            'deliver'              => core()->getCurrentChannel()->name,
            'reference_1_label'    => 'Item : ',
            'reference_1'          => $item->name,
        ];

        return $fields;
    }
    public function getBillPlzlUrl($params = [])
    {
        return sprintf('https://www.billplz.com/api/v3/bills',
                $params ? '?' . http_build_query($params) : ''
            );
    }
}
