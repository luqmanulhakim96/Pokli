<?php

namespace Artanis\BillPlz\Payment;
use Webkul\Payment\Payment\Payment;
/**
 * Cash On Delivery payment method class
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class BillPlz extends Payment
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'billplz';

    public function getRedirectUrl()
    {

    }
}
