<?php
namespace App\Http\Controllers\Search;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/my_form/search/client', [ClientController::class, 'show'])->name('search_client');
    Route::get('/my_form/search/applicant', [ApplicantController::class, 'show'])->name('search_applicant');
    Route::get('/my_form/search/student', [StudentController::class, 'show'])->name('search_student');
    
    Route::middleware(['admin'])->group(function() {
        Route::get('/my_form/search/vacancy', [VacancyController::class, 'show'])->name('search_vacancy');
    });
});
