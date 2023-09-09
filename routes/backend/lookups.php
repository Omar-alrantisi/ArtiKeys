<?php

use App\Domains\Lookups\Models\LookupTag;
use Tabuna\Breadcrumbs\Trail;
use App\Domains\Lookups\Models\Country;
use App\Domains\Lookups\Models\City;
use App\Domains\Lookups\Http\Controllers\Backend\CountryController;
use App\Domains\Lookups\Http\Controllers\Backend\CityController;
use App\Domains\Lookups\Models\Page;
use App\Domains\Lookups\Http\Controllers\Backend\PageController;
use App\Domains\Lookups\Models\Language;
use App\Domains\Lookups\Http\Controllers\Backend\LanguageController;
use App\Domains\Lookups\Models\Category;
use App\Domains\Lookups\Http\Controllers\Backend\CategoryController;
use App\Domains\Lookups\Models\VehicleType;
use App\Domains\Lookups\Http\Controllers\Backend\VehicleTypeController;
use App\Domains\Lookups\Http\Controllers\Backend\LookupTagController;
use App\Domains\Complaint\Http\Controllers\Backend\ComplaintTypeController;
use App\Domains\Complaint\Models\ComplaintType;
use App\Domains\Complaint\Http\Controllers\Backend\CaptainComplaintTypeController;

Route::group([
    'prefix' => 'lookups',
    'as' => 'lookups.',
    'middleware' => config('boilerplate.access.middleware.verified'),
], function (){

    /**
     * Countries Routes
     */
    Route::group([
        'prefix' => 'country',
        'as' => 'country.'
    ], function (){
        Route::get('create', [CountryController::class, 'create'])
            ->name('create')
            ->middleware('permission:admin.lookups.country.store')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.lookups.country.index')
                    ->push(__('Create Country'), route('admin.lookups.country.create'));
            });

        Route::post('store', [CountryController::class, 'store'])
            ->name('store')
            ->middleware('permission:admin.lookups.country.store');

        Route::group(['prefix' => '{country}'], function () {
            Route::get('edit', [CountryController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:admin.lookups.country.update')
                ->breadcrumbs(function (Trail $trail, Country $country) {
                    $trail->parent('admin.lookups.country.index', $country)
                        ->push(__('Editing :entity', ['entity' => __('Country')]), route('admin.lookups.country.edit', $country));
                });

            Route::patch('/', [CountryController::class, 'update'])
                ->name('update')
                ->middleware('permission:admin.lookups.country.update');

            Route::delete('delete', [CountryController::class, 'destroy'])
                ->name('delete')
                ->middleware('permission:admin.lookups.country.delete');
        });

        Route::get('/', [CountryController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.lookups.country.list|admin.lookups.country.store|admin.lookups.country.update|admin.lookups.country.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Country Management'), route('admin.lookups.country.index'));
            });
    });
    /**
     * End Countries Routes
     */

    /**
     * City Routes
     */
    Route::group([
        'prefix' => 'city',
        'as' => 'city.'
    ], function (){
        Route::get('/', [CityController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.lookups.city.list|admin.lookups.city.store|admin.lookups.city.update|admin.lookups.city.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('City Management'), route('admin.lookups.city.index'));
            });

        Route::get('create', [CityController::class, 'create'])
            ->name('create')
            ->middleware('permission:admin.lookups.city.store')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.lookups.city.index')
                    ->push(__('Create City'), route('admin.lookups.city.create'));
            });

        Route::post('store', [CityController::class, 'store'])
            ->name('store')
            ->middleware('permission:admin.lookups.city.store');

        Route::group(['prefix' => '{city}'], function () {
            Route::get('edit', [CityController::class, 'edit'])
                ->name('edit')
                ->middleware('permission:admin.lookups.city.update')
                ->breadcrumbs(function (Trail $trail, City $city) {
                    $trail->parent('admin.lookups.city.index', $city)
                        ->push(__('Editing :entity', ['entity' => __('City')]), route('admin.lookups.city.edit', $city));
                });

            Route::patch('/', [CityController::class, 'update'])
                ->name('update')
                ->middleware('permission:admin.lookups.city.update');

            Route::delete('delete', [CityController::class, 'destroy'])
                ->name('delete')
                ->middleware('permission:admin.lookups.city.delete');
        });
    });
    /**
     * End City Routes
     */
});
