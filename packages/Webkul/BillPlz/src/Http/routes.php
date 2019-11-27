<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('billplz/standard')->group(function () {

        Route::get('/redirect', 'Webkul\BillPlz\Http\Controllers\StandardController@redirect')->name('billplz.standard.redirect');

        Route::get('/success', 'Webkul\BillPlz\Http\Controllers\StandardController@success')->name('billplz.standard.success');

        Route::get('/cancel', 'Webkul\BillPlz\Http\Controllers\StandardController@cancel')->name('billplz.standard.cancel');
    });
});

Route::get('billplz/standard/ipn', 'Webkul\BillPlz\Http\Controllers\StandardController@ipn')->name('billplz.standard.ipn');

Route::post('billplz/standard/ipn', 'Webkul\BillPlz\Http\Controllers\StandardController@ipn')->name('billplz.standard.ipn');
