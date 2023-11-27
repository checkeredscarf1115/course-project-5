<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::get('/my_form/search/client', [ClientController::class, 'search'])->name('search_client');
    Route::get('/my_form/search/applicant', [ApplicantController::class, 'search'])->name('search_applicant');
    Route::get('/my_form/search/student', [StudentController::class, 'search'])->name('search_student');
    Route::get('/my_form/search/vacancy', [VacancyController::class, 'search'])->name('search_vacancy');
    Route::get('/my_form/search/course', [CourseController::class, 'search'])->name('search_course');
    Route::get('/my_form/search/company', [CompanyController::class, 'search'])->name('search_company');
    Route::get('/my_form/search/institution', [InstitutionController::class, 'search'])->name('search_institution');
});
