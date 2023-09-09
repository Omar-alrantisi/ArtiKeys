<?php
use Tabuna\Breadcrumbs\Trail;

use App\Domains\Subscription\Http\Controllers\Backend\SubscriptionController;
use App\Domains\Subscription\Models\Subscription;

Route::group([
    'prefix' => 'subscription',
    'as' => 'subscription.',
    'middleware' => config('boilerplate.access.middleware.verified'),
], function () {

    Route::group([
        'prefix' => 'subscription',
        'as' => 'subscription.'
    ], function (){
        Route::group(['prefix' => '{subscription}'], function () {
            Route::get('edit', [SubscriptionController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:admin.subscription.update')
                ->breadcrumbs(function (Trail $trail, Subscription $subscription) {
                    $trail->parent('admin.subscription.subscription.index', $subscription)
                        ->push(__('Editing :entity', ['entity' => $subscription->title]), route('admin.subscription.subscription.edit', $subscription));
                });

            Route::patch('/', [SubscriptionController::class, 'update'])
                ->name('update')
                ->middleware('permission:admin.subscription.update');

            Route::delete('delete', [SubscriptionController::class, 'destroy'])
                ->name('delete')
                ->middleware('permission:admin.subscription.delete');
        });

        Route::get('/', [SubscriptionController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.subscription.subscription.list|admin.subscription.update|admin.subscription.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('subscription Management'), route('admin.subscription.subscription.index'));
            });
        Route::post('updateSubscriberRatings', [SubscriptionController::class, 'updateSubscriberRatings'])->name('updateSubscriberRatings');
        Route::post('updateSubscriberRatingExam1', [SubscriptionController::class, 'updateSubscriberRatingExam1'])->name('updateSubscriberRatingExam1') ->middleware('permission:admin.subscription.updateSubscriberRatingExam1');;
        Route::post('updateSubscriberRatingExam2', [SubscriptionController::class, 'updateSubscriberRatingExam2'])->name('updateSubscriberRatingExam2') ->middleware('permission:admin.subscription.updateSubscriberRatingExam2');;
        Route::post('updateSubscriberRatingExam3', [SubscriptionController::class, 'updateSubscriberRatingExam3'])->name('updateSubscriberRatingExam3') ->middleware('permission:admin.subscription.updateSubscriberRatingExam3');;
        Route::get('updateStatusBySubscriberId', [SubscriptionController::class, 'updateStatus'])->name('updateStatusBySubscriberId');

    });

});
