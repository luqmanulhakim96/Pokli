<?php
Route::group(['middleware' => ['web']], function () {
    // Route::view('/purchase', 'gapsap::index');

    Route::get('/home/liveprice', 'Artanis\LivePrice\Http\Controllers\LivePriceController@index')->defaults('_config', [
        'view' => 'liveprice::index'
    ])->name('liveprice.index');
});
