<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function() {
    Route::controller(ClientController::class)->group(function () {
        Route::match(['get', 'post'], '/record/client', 'show')->name('form_client');
        Route::post('/record/client/result', 'insert')->name('insert_client');
        Route::get('/search/client',  'search')->name('search_client');
    });

    Route::controller(ApplicantController::class)->group(function () {
        Route::match(['get', 'post'], '/record/applicant', 'show')->name('form_applicant');
        Route::post('/record/applicant/result', 'insert')->name('insert_applicant');
        Route::get('/search/applicant', 'search')->name('search_applicant');
    });

    Route::controller(StudentController::class)->group(function () {
        Route::match(['get', 'post'], '/record/student', 'show')->name('form_student');
        Route::post('/record/student/result', 'insert')->name('insert_student');
        Route::get('/search/student', 'search')->name('search_student');
    });

    Route::controller(VacancyController::class)->group(function () {
        Route::match(['get', 'post'], '/record/vacancy', 'show')->name('form_vacancy');
        Route::post('/record/vacancy/result', 'insert')->name('insert_vacancy');
        Route::get('/search/vacancy', 'search')->name('search_vacancy');
    });

    Route::controller(CourseController::class)->group(function () {
        Route::match(['get', 'post'], '/record/course', 'show')->name('form_course');
        Route::post('/record/course/result', 'insert')->name('insert_course');
        Route::get('/search/course', 'search')->name('search_course');
    });

    Route::controller(CompanyController::class)->group(function () {
        Route::match(['get', 'post'], '/record/company', 'show')->name('form_company');
        Route::post('/record/company/result', 'insert')->name('insert_company');
        Route::get('/search/company', 'search')->name('search_company');
    });

    Route::controller(InstitutionController::class)->group(function () {
        Route::match(['get', 'post'], '/record/institution', 'show')->name('form_institution');
        Route::post('/record/institution/result', 'insert')->name('insert_institution');
        Route::get('/search/institution', 'search')->name('search_institution');
    });
});
