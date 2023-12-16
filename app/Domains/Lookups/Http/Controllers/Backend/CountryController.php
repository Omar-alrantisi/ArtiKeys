<?php

namespace App\Domains\Lookups\Http\Controllers\Backend;

use App\Domains\Lookups\Http\Requests\Backend\CountryRequest;
use App\Domains\Lookups\Models\Country;
use App\Domains\Lookups\Services\CountryService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CountryController extends Controller
{

    private CountryService $countryService;

    /**
     * @param CountryService $countryService
     */
    public function __construct(CountryService $countryService)
    {
         $this->countryService = $countryService;
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('backend.lookups.country.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.lookups.country.create');
    }

    /**
     * @param CountryRequest $request
     * @return mixed
     */
    public function store(CountryRequest $request)
    {
        $this->countryService->store($request->validated());

        return redirect()->route('admin.lookups.country.index')->withFlashSuccess(__('The Country was successfully added'));
    }

    /**
     * @param Country $country
     * @return mixed
     */
    public function edit(Country $country)
    {
        return view('backend.lookups.country.edit')
            ->withCountry($country);
//            ->withMunicipalities($this->municipalityService->getAsLookups());
    }

    /**
     * @param CountryRequest $request
     * @param $country
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(CountryRequest $request, $country)
    {
        $this->countryService->update($country, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Country was successfully updated'));
    }

    /**
     * @param $country
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function destroy($country)
    {
        $this->countryService->destroy($country);
        return redirect()->back()->withFlashSuccess(__('The Country was successfully deleted.'));
    }
}
