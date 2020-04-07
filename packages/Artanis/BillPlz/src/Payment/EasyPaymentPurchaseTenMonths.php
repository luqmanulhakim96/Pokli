<?php

namespace Artanis\BillPlz\Payment;
use Illuminate\Support\Facades\Config;
use Webkul\Payment\Payment\Payment;
use Billplz\Client;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class EasyPaymentPurchaseTenMonths extends Payment
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'easy_payment_purchase_ten_months';

    private $easy_payment_purchase;

    public function __construct()
    {
        // $this->billplz = Client::make('155994cc-37ea-4c78-9460-1062df930f2c', 'S-b4db8m12r7Te8JmS9O79Rg');
        // $this->billplz->useSandbox();
    }
    public static function make()
    {
        return (new self())->$easy_payment_purchase;
    }

    public function getRedirectUrl()
    {
        // return route('billplz.redirect');
        return route('epptenmonths.calculatePriceTenMonths');
    }

    public function getFormFields()
    {

    }
}
