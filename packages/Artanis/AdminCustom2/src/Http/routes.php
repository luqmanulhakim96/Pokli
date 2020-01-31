<?php
Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {

        // Admin Routes
        Route::group(['middleware' => ['admin']], function () {

            // Sales Routes
            Route::prefix('catalog')->group(function () {

              // Route::get('/product/delivery', 'Artanis\AdminCustom2\Http\Controllers\AdminCustom2Controller@index')->defaults('_config', [
              //     'view' => 'admincustom2::catalog.products.index'
              // ])->name('admincustom2.catalog.products.index');
            });

        });
    });
});
