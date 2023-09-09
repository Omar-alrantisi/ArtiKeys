<?php
use Tabuna\Breadcrumbs\Trail;

use App\Domains\Page\Models\Page;
use App\Domains\Page\Http\Controllers\Backend\PageController;
/**
 * Page Routes
 */
Route::group([
    'prefix' => 'page',
    'as' => 'page.'
], function (){
    Route::get('/', [PageController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.page.list|admin.page.store|admin.page.update|admin.page.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Page Management'), route('admin.page.index'));
        });

    Route::get('create', [PageController::class, 'create'])
        ->name('create')
        ->middleware('permission:admin.page.store')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.page.index')
                ->push(__('Create Page'), route('admin.page.create'));
        });

    Route::post('store', [PageController::class, 'store'])
        ->name('store')
        ->middleware('permission:admin.page.store');

    Route::group(['prefix' => '{page}'], function () {
        Route::get('edit', [PageController::class, 'edit'])
            ->name('edit')
            ->middleware('permission:admin.page.update')
            ->breadcrumbs(function (Trail $trail, Page $page) {
                $trail->parent('admin.page.index', $page)
                    ->push(__('Editing :entity', ['entity' => __('Page')]), route('admin.page.edit', $page));
            });

        Route::patch('/', [PageController::class, 'update'])
            ->name('update')
            ->middleware('permission:admin.page.update');

        Route::delete('delete', [PageController::class, 'destroy'])
            ->name('delete')
            ->middleware('permission:admin.page.delete');
    });
    Route::group(['prefix' => '{page}'], function () {
        Route::get('editTranslation', [PageController::class, 'editTranslation'])
            ->name('editTranslation')
            ->middleware('permission:admin.page.update')
            ->breadcrumbs(function (Trail $trail, Page $page) {
                $trail->parent('admin.page.index', $page)
                    ->push(__('Editing :entity', ['entity' => __('Page')]), route('admin.page.editTranslation', $page));

            });
        Route::patch('/updateTranslation', [PageController::class, 'updateTranslation'])
            ->name('updateTranslation')
            ->middleware('permission:admin.page.update');
    });
});
/**
 * End Page Routes
 */
