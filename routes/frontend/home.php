<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use App\Http\Controllers\Frontend\HelpController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });
Route::get('help', [HelpController::class, 'index'])
    ->name('pages.help')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Help'), route('frontend.pages.help'));
    });


//Route::get('/exam', [ExamController::class, 'showExamForm'])->name('exam.form');
//Route::post('/exam/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
//Route::get('/exam/result/{exam}', [ExamController::class, 'showResult'])->name('exam.result');

