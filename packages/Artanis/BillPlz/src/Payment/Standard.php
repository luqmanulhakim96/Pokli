<?php
namespace Artanis\BillPlz\Payment;
use Billplz\Client;
/**
 * BillPlz Wrapper
 */
class Standard
{
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
}
