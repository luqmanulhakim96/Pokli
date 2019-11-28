<?php
namespace Artanis\BillPlz\Payment;
use Webkul\Payment\Payment\Payment;

use Billplz\Client;
/**
 * BillPlz Wrapper
 */
class Billplz extends payment
{
    // private $billplz;
    // public function __construct()
    // {
    //     $this->billplz = Client::make(config('billplz.api_key'));
    //     $this->billplz->useVersion(config('billplz.version'));
    //     if (app()->environment() != "production") {
    //         $this->billplz->useSandbox();
    //     }
    // }
    // public static function make()
    // {
    //     return (new self())->billplz;
    // }

    protected $code  = 'billplz';

    public function getRedirectUrl()
    {

    }
}
