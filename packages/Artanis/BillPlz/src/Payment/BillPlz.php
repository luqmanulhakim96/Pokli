<?php

namespace Artanis\BillPlz\Payment;
use Webkul\Payment\Payment\Payment;

abstract class BillPlz extends Payment
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
