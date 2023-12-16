<?php

namespace App\Domains\Lookups\Http\Controllers\Backend;

use App\Domains\Lookups\Http\Requests\Backend\CountryRequest;
use App\Domains\Lookups\Http\Requests\Backend\TestRequest;
use App\Domains\Lookups\Models\Country;
use App\Domains\Lookups\Services\TestService;
use App\Exceptions\GeneralException;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{

    private TestService $testService;

    /**
     * @param TestService $testService
     */
    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function index()
    {
        return view('backend.lookups.tests.index');
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('backend.lookups.tests.create');
    }


    /**
     * @param TestRequest $request
     * @return mixed
     */
    public function store(TestRequest $request)
    {
        $this->testService->store($request->validated());

        return redirect()->route('admin.lookups.tests.index')->withFlashSuccess(__('The Question was successfully added'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * @param Test $test
     * @return mixed
     */
    public function edit(Test $test)
    {
        return view('backend.lookups.tests.edit')
            ->withTest($test);
//            ->withMunicipalities($this->municipalityService->getAsLookups());
    }

    /**
     * @param TestRequest $request
     * @param $test
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update(TestRequest $request, $test)
    {
        $this->testService->update($test, $request->validated());

        return redirect()->back()->withFlashSuccess(__('The Question was successfully updated'));
    }

    /**
     * @param $test
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function destroy($test)
    {
        $this->testService->destroy($test);
        return redirect()->back()->withFlashSuccess(__('The Question was successfully deleted.'));
    }
}
