<?php
/*
 * Billplz Helper
 */
use Artanis\Payment\BillPlz;

if (!function_exists('billplz')) {
    function billplz()
    {
        return Billplz::make();
    }
}
