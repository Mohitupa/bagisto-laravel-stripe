<?php
use Illuminate\Support\Facades\Route;

Route::group([
        'prefix'        => 'admin/stripecustom',
        'middleware'    => ['web', 'admin']
    ], function () {

        Route::get('', 'Webkul\StripeCustom\Http\Controllers\Admin\StripeCustomController@index')->defaults('_config', [
            'view' => 'stripecustom::admin.index',
        ])->name('admin.stripecustom.index');

});