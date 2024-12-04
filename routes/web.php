<?php

use App\Http\Middleware\SetLocaleFromHeader;

Route::middleware([SetLocaleFromHeader::class])->group(function () {
    Route::get('/', function () {
        return view('index');
    });
});
