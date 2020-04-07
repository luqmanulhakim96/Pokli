<?php

    // Route::view('/payment', 'payment::payment.payment');

    Route::group(['middleware' => ['web']], function () {

        Route::get('billplz/redirect', 'Artanis\BillPlz\Http\Controllers\StandardController@redirect')->name('billplz.redirect');

        Route::get('billplz/success/{transaction_id}', 'Artanis\BillPlz\Http\Controllers\StandardController@success')->name('billplz.success');

        Route::get('billplz/cancel', 'Artanis\BillPlz\Http\Controllers\StandardController@cancel')->name('billplz.cancel');

        Route::get('billplz/verify', 'Artanis\BillPlz\Http\Controllers\StandardController@verify')->name('billplz.verify');

        Route::get('billplz/redirect-away', 'Artanis\BillPlz\Http\Controllers\StandardController@redirectBillPlz')->name('billplz.redirectBillPlz');

        Route::get('easy-payment-four-months-gateway/review', 'Artanis\BillPlz\Http\Controllers\EPPFourMonthsController@calculatePriceFourMonths')->name('eppfourmonths.calculatePriceFourMonths');

        Route::get('easy-payment-four-months-gateway/redirect', 'Artanis\BillPlz\Http\Controllers\EPPFourMonthsController@redirect')->name('eppfourmonths.redirect');

        Route::get('easy-payment-four-months-gateway/store', 'Artanis\BillPlz\Http\Controllers\EPPFourMonthsController@store')->name('eppfourmonths.store');

        Route::get('easy-payment-four-months-gateway/cancel', 'Artanis\BillPlz\Http\Controllers\EPPFourMonthsController@cancel')->name('eppfourmonths.cancel');

        Route::get('easy-payment-ten-months-gateway/review', 'Artanis\BillPlz\Http\Controllers\EPPTenMonthsController@calculatePriceTenMonths')->name('epptenmonths.calculatePriceTenMonths');

        Route::get('easy-payment-ten-months-gateway/redirect', 'Artanis\BillPlz\Http\Controllers\EPPTenMonthsController@redirect')->name('epptenmonths.redirect');

        Route::get('easy-payment-ten-months-gateway/store', 'Artanis\BillPlz\Http\Controllers\EPPTenMonthsController@store')->name('epptenmonths.store');

        Route::get('easy-payment-ten-months-gateway/cancel', 'Artanis\BillPlz\Http\Controllers\EPPTenMonthsController@cancel')->name('epptenmonths.cancel');


    });
