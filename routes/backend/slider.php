<?php
use Tabuna\Breadcrumbs\Trail;
use App\Domains\Slider\Models\Slider;
use App\Domains\Slider\Http\Controllers\Backend\SliderController;

    /**
     * Slider Routes
     */
    Route::group([
        'prefix' => 'slider',
        'as' => 'slider.'
    ], function () {
        Route::get('create', [SliderController::class, 'create'])
            ->name('create')
            ->middleware('permission:admin.slider.store')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.slider.index')
                    ->push(__('Create Slider'), route('admin.slider.create'));
            });

        Route::post('store', [SliderController::class, 'store'])
            ->name('store')
            ->middleware('permission:admin.slider.store');

        Route::group(['prefix' => '{slider}'], function () {
            Route::get('edit', [SliderController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:admin.slider.update')
                ->breadcrumbs(function (Trail $trail, Slider $slider) {
                    $trail->parent('admin.slider.index', $slider)
                        ->push(__('Editing :entity', ['entity' => __('Slider')]), route('admin.slider.edit', $slider));
                });

            Route::patch('/', [SliderController::class, 'update'])
                ->name('update')
                ->middleware('permission:admin.slider.update');

            Route::delete('delete', [SliderController::class, 'destroy'])
                ->name('delete')
                ->middleware('permission:admin.slider.delete');
        });
        Route::group(['prefix' => '{slider}'], function () {
            Route::get('editTranslation', [SliderController::class, 'editTranslation'])
                ->name('editTranslation')
                ->middleware('permission:admin.slider.update')
                ->breadcrumbs(function (Trail $trail, Slider $slider) {
                    $trail->parent('admin.slider.index', $slider)
                        ->push(__('Editing :entity', ['entity' => __('Slider')]), route('admin.slider.editTranslation', $slider));

                });
            Route::patch('/updateTranslation', [SliderController::class, 'updateTranslation'])
                ->name('updateTranslation')
                ->middleware('permission:admin.slider.update');
        });
        Route::get('/', [SliderController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.slider.list|admin.slider.store|admin.slider.update|admin.slider.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Sliders Management'), route('admin.slider.index'));
            });
        Route::get('updateStatusBySliderId', [SliderController::class, 'updateStatus'])->name('updateStatusBySliderId');


    });

/**
     * End Slider Routes
     */
