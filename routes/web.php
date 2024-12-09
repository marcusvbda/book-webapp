<?php

use App\Http\Controllers\ServicesController;
use App\Http\Middleware\SetLocaleFromHeader;

Route::middleware([SetLocaleFromHeader::class])->group(function () {
    Route::get('/', fn() =>  view('index'))->name('home');
    Route::get('/s/{filter}', [ServicesController::class, 'resultPage'])->name('search');
});
