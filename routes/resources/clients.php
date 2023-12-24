<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('client')
    ->as('client.')
    ->group(function() {
    Route::controller(ClientController::class)->group(function () {
        Route::match(['get', 'post'], '/record', 'show')->name('form');
        Route::post('/record/result', 'insert')->name('change');
        Route::get('/search',  'search')->name('search');
    });
});
