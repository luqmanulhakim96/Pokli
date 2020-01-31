<?php

    // Route::view('/payment', 'payment::payment.payment');

    Route::group(['middleware' => ['web']], function () {

        Route::get('billplz/redirect', 'Artanis\BillPlz\Http\Controllers\StandardController@redirect')->name('billplz.redirect');

        Route::get('billplz/success', 'Artanis\BillPlz\Http\Controllers\StandardController@success')->name('billplz.success');

        Route::get('billplz/cancel', 'Artanis\BillPlz\Http\Controllers\StandardController@cancel')->name('billplz.cancel');

        Route::get('billplz/verify', 'Artanis\BillPlz\Http\Controllers\StandardController@verify')->name('billplz.verify');

        Route::post('billplz/redirect-away', 'Artanis\BillPlz\Http\Controllers\StandardController@redirectBillPlz')->name('billplz.redirectBillPlz');
    });
