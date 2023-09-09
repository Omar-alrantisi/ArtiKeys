<?php
use Tabuna\Breadcrumbs\Trail;
use App\Domains\WebsiteSetting\Http\Controllers\Backend\WebsiteSettingController;
use App\Domains\WebsiteSetting\Models\WebsiteSetting;
/**
     * websiteSetting Routes
     */
    Route::group([
        'prefix' => 'websiteSetting',
        'as' => 'websiteSetting.'
    ], function () {
        Route::group(['prefix' => '{websiteSetting}'], function () {
            Route::get('edit', [WebsiteSettingController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:admin.websiteSetting.update')
                ->breadcrumbs(function (Trail $trail, WebsiteSetting $websiteSetting) {
                    $trail->parent('admin.websiteSetting.index', $websiteSetting)
                        ->push(__('Editing :entity', ['entity' => __('WebsiteSetting')]), route('admin.websiteSetting.edit', $websiteSetting));
                });

            Route::patch('/', [WebsiteSettingController::class, 'update'])
                ->name('update')
                ->middleware('permission:admin.websiteSetting.update');

            Route::delete('delete', [WebsiteSettingController::class, 'destroy'])
                ->name('delete')
                ->middleware('permission:admin.websiteSetting.delete');
        });

        Route::get('/', [WebsiteSettingController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.websiteSetting.list|admin.websiteSetting.store|admin.websiteSetting.update|admin.websiteSetting.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Website Setting Management'), route('admin.websiteSetting.index'));
            });
    });
    /**
     * End Setting Routes
     */
