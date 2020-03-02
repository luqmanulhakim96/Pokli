<?php
return [
    'cashondelivery' => [
        'code' => 'cashondelivery',
        'title' => 'Cash On Delivery',
        'description' => 'shop::app.checkout.onepage.cash-desc',
        'class' => 'Webkul\Payment\Payment\CashOnDelivery',
        'active' => true,
        'sort' => 1
    ],

    'moneytransfer' => [
        'code' => 'moneytransfer',
        'title' => 'Money Transfer',
        'description' => 'shop::app.checkout.onepage.money-desc',
        'class' => 'Webkul\Payment\Payment\MoneyTransfer',
        'active' => false,
        'sort' => 2
    ],

    'paypal_standard' => [
        'code' => 'paypal_standard',
        'title' => 'Paypal Standard',
        'description' => 'shop::app.checkout.onepage.paypal-desc',
        'class' => 'Webkul\Paypal\Payment\Standard',
        'sandbox' => true,
        'active' => true,
        'business_account' => 'test@webkul.com',
        'sort' => 3
    ],

    'billplz' => [
        'code' => 'billplz',
        'title' => 'FPX',
        'description' => 'Bank Transfer',
        'class' => 'Artanis\BillPlz\Payment\BillPlz',
        'sandbox' => true,
        'active' => true,
        'sort' => 4
    ],

    'easy_payment_purchase_four_months' => [
        'code' => 'easy_payment_purchase_four_months',
        'title' => 'Easy Payment Purchase',
        'description' => 'EPP - 4 Months',
        'class' => 'Artanis\BillPlz\Payment\EasyPaymentPurchaseFourMonths',
        'active' => true,
        'sort' => 5
    ],

    'easy_payment_purchase_ten_months' => [
        'code' => 'easy_payment_purchase_ten_months',
        'title' => 'Easy Payment Purchase',
        'description' => 'EPP - 10 Months',
        'class' => 'Artanis\BillPlz\Payment\EasyPaymentPurchaseTenMonths',
        'active' => true,
        'sort' => 6
    ]

];
