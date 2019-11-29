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

    }
}
