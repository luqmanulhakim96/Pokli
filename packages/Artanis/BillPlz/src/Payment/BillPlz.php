<?php
namespace Artanis\BillPlz\Payment;
use Webkul\Payment\Payment\Payment;
use Billplz\Client;
// use Billplz\Laravel\Billplz;
/**
 * BillPlz Wrapper
 */
abstract class Billplz extends Payment
{
    protected $code  = 'billplz';

    public function getRedirectUrl()
    {

    }
}
