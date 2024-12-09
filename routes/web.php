<?php

use App\Helper;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\SetLocaleConfig;

Route::get('/', function () {
    $locale = Helper::getRouterLocale();
    return redirect(route('home', ['lang' => $locale]));
});

Route::middleware([SetLocaleConfig::class])->group(function () {
    Route::group(["prefix" => "{lang}"], function () {
        Route::get('/', fn() =>  view('index'))->name('home');
        Route::get('/s/{filter}', [ServicesController::class, 'resultPage'])->name('search');
    });
});
