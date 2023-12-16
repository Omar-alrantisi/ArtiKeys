<?php
use App\Domains\Auth\Http\Controllers\Frontend\Auth\FrontUserController;
use App\Domains\Subscription\Http\Controllers\Frontend\SubscriptionFrontController;
use App\Domains\Subscription\Http\Controllers\Frontend\SubscriptionInfoFrontController;
use App\Domains\Subscription\Http\Controllers\Frontend\PersonalQuestionFrontController;
use App\Domains\Subscription\Http\Controllers\Frontend\UserEnglishTestFrontController;
use App\Domains\Subscription\Http\Controllers\Frontend\CodeChallengeSubmissionFrontController;
use App\Http\Controllers\ExamController;

Route::group([
    'prefix' => 'frontSubscription',
    'as' => 'frontSubscription.',
], function (){
    Route::group([
        'prefix' => 'user',
        'as' => 'user.'
    ], function (){
        Route::post('store', [FrontUserController::class, 'store'])
            ->name('store');

        Route::get('checkEmail', [FrontUserController::class, 'validateEmail'])->name('checkEmail');
    });

    Route::group([
        'prefix' => 'subscribe',
        'as' => 'subscribe.',
        'middleware' => ['auth','check_verify'],

    ], function (){
        Route::post('store', [SubscriptionFrontController::class, 'store'])
            ->name('store');

        Route::get('/', [SubscriptionFrontController::class, 'index'])
            ->name('index');
    });
    Route::group([
        'prefix' => 'emailVerification',
        'as' => 'emailVerification.',
        'middleware' => ['auth','check_verify'],

    ], function (){
        Route::post('mobile-verification/verify', [SubscriptionFrontController::class, 'verifyEmail'])
            ->name('verify');

        Route::get('/', [SubscriptionFrontController::class, 'emailVerificationIndex'])
            ->name('index');

        Route::post('/resend-verification-code', [SubscriptionFrontController::class, 'resendVerificationCode'])->name('resendVerificationCode');

    });
    Route::group([
        'prefix' => 'mobileVerification',
        'as' => 'mobileVerification.',
        'middleware' => ['auth','check_verify'],

    ], function (){
        Route::post('store', [SubscriptionFrontController::class, 'store'])
            ->name('store');

        Route::get('/', [SubscriptionFrontController::class, 'mobileVerificationIndex'])
            ->name('index');
        Route::post('verify', [SubscriptionFrontController::class, 'checkVerificationCode'])
            ->name('verify');
    });
    Route::group(['middleware' => ['auth','check_verify']], function() {
        Route::group([
            'prefix' => 'confirmation',
            'as' => 'confirmation.',

        ], function () {


            Route::get('/', [SubscriptionFrontController::class, 'indexConfirmation'])
                ->name('index');

        });
    });
    Route::group([
        'prefix' => 'subscribeInfo',
        'as' => 'subscribeInfo.',
        'middleware' => ['auth','check_verify'],

    ], function (){
        Route::post('store', [SubscriptionInfoFrontController::class, 'store'])
            ->name('store');

        Route::get('/', [SubscriptionInfoFrontController::class, 'index'])
            ->name('index');
    });
    Route::group([
        'prefix' => 'personalQuestion',
        'as' => 'personalQuestion.',
        'middleware' => ['auth','check_verify'],

    ], function (){
        Route::post('store', [PersonalQuestionFrontController::class, 'store'])
            ->name('store');

        Route::get('/', [PersonalQuestionFrontController::class, 'index'])
            ->name('index');
    });
    Route::group([
        'prefix' => 'englishTest',
        'as' => 'englishTest.',
        'middleware' => ['auth','check_verify'],

    ], function (){

        Route::get('/exam', [ExamController::class, 'showExamForm'])->name('exam.form');
        Route::post('/exam/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
        Route::get('/exam/result/{exam}', [ExamController::class, 'showResult'])->name('exam.result');

        Route::post('store', [UserEnglishTestFrontController::class, 'store'])
            ->name('store');

        Route::get('/', [UserEnglishTestFrontController::class, 'index'])
            ->name('index');
    });
    Route::group([
        'prefix' => 'codeChallenge',
        'as' => 'codeChallenge.',
        'middleware' => ['auth','check_verify'],

    ], function (){
        Route::post('store', [CodeChallengeSubmissionFrontController::class, 'store'])
            ->name('store');

        Route::get('/', [CodeChallengeSubmissionFrontController::class, 'index'])
            ->name('index');
    });
});

