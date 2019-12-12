<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {

        // Admin Routes
        Route::group(['middleware' => ['admin']], function () {

            // Sales Routes
            Route::prefix('sales')->group(function () {

                // Sales Purchase Routes
                // Route::get('/refunds', 'Artanis\AdminCustom\Http\Controllers\Sales\RefundController@index')->defaults('_config', [
                //     'view' => 'admincustom::sales.purchase.index'
                // ])->name('admincustom.sales.purchase.index');

                // Route::get('/refunds/create/{order_id}', 'Webkul\Admin\Http\Controllers\Sales\RefundController@create')->defaults('_config', [
                //     'view' => 'admin::sales.refunds.create'
                // ])->name('admin.sales.refunds.create');

                // Route::post('/refunds/create/{order_id}', 'Webkul\Admin\Http\Controllers\Sales\RefundController@store')->defaults('_config', [
                //     'redirect' => 'admin.sales.orders.view'
                // ])->name('admin.sales.refunds.store');

                // Route::post('/refunds/update-qty/{order_id}', 'Webkul\Admin\Http\Controllers\Sales\RefundController@updateQty')->defaults('_config', [
                //     'redirect' => 'admin.sales.orders.view'
                // ])->name('admin.sales.refunds.update_qty');

                // Route::get('/refunds/view/{id}', 'Webkul\Admin\Http\Controllers\Sales\RefundController@view')->defaults('_config', [
                //     'view' => 'admin::sales.refunds.view'
                // ])->name('admin.sales.refunds.view');
            });

        });
    });
});