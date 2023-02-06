<?php
use Illuminate\Support\Facades\Route;

Route::group([
        'prefix'     => 'stripecustom',
        'middleware' => ['web', 'theme', 'locale', 'currency']
    ], function () {

        Route::get('/', 'Webkul\StripeCustom\Http\Controllers\Shop\StripeCustomController@index')->defaults('_config', [
            'view' => 'stripecustom::shop.index',
        ])->name('shop.stripecustom.index');

});