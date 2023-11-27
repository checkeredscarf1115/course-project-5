<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/my_form/record/client', [ClientController::class, 'show'])->name('form_client');
    Route::get('/my_form/record/applicant', [ApplicantController::class, 'show'])->name('form_applicant');
    Route::get('/my_form/record/student', [StudentController::class, 'show'])->name('form_student');
    Route::get('/my_form/record/vacancy', [VacancyController::class, 'search'])->name('form_vacancy');
    Route::get('/my_form/record/course', [VacancyController::class, 'search'])->name('form_course');
    Route::get('/my_form/record/company', [VacancyController::class, 'search'])->name('form_company');
    Route::get('/my_form/record/institution', [VacancyController::class, 'search'])->name('form_institution');
    
    // Route::middleware(['admin'])->group(function() {
    //     Route::get('/my_form/record/vacancy', [VacancyController::class, 'show'])->name('form_vacancy');
    // });
});
