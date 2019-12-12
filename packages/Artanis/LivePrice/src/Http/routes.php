<?php
Route::group(['middleware' => ['web']], function () {
    // Route::view('/purchase', 'gapsap::index');

    Route::get('/liveprice', 'Artanis\LivePrice\Http\Controllers\LivePriceController@index')->defaults('_config', [
        'view' => 'liveprice::index'
    ])->name('liveprice.index');

    Route::get('/liveapi', 'Artanis\LivePrice\Http\Controllers\LivePriceController@index')->defaults('_config', [
        'view' => 'liveapi::index'
    ])->name('liveapi.index');
});
