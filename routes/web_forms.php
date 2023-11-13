<?php
namespace App\Http\Controllers\Forms;

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('/my_form/record/client', [ClientController::class, 'show'])->name('form_client');
    Route::get('/my_form/record/applicant', [ApplicantController::class, 'show'])->name('form_applicant');
    Route::get('/my_form/record/student', [StudentController::class, 'show'])->name('form_student');
});
