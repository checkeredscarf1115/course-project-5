<?php
namespace App\Http\Controllers\Forms;

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/my_form/client', [ClientController::class, 'show']);

});