<?php
/*
 * Billplz Helper
 */
if (!function_exists('billplz')) {
    function billplz()
    {
        return \Artanis\Payment\Billplz::make();
    }
}
