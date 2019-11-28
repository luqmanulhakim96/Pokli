<?php
Route::group(['middleware' => ['web']], function () {
    // Route::view('/purchase', 'gapsap::index');

    Route::get('/purchase', 'Artanis\GapSap\Http\Controllers\GapSapController@index')->defaults('_config', [
        'view' => 'gapsap::index'
    ])->name('gapsap.index');
    Route::post('/purchase/form', 'Artanis\GapSap\Http\Controllers\GapSapController@form')->defaults('_config', [
        'view' => 'gapsap::form.index'
    ])->name('gapsap.form');
    Route::post('/purchase/form-submit', 'Artanis\GapSap\Http\Controllers\GapSapController@formSubmit')->defaults('_config', [
        'view' => 'gapsap::form.submit'
    ])->name('gapsap.form-submit');
});