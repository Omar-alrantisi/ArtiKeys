<?php
namespace App\Domains\Subscription\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Domains\Lookups\Services\CityService;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionFrontRequest;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionInfoFrontRequest;
use App\Domains\Subscription\Services\SubscriptionInfoService;
use App\Domains\Subscription\Services\SubscriptionService;


use App\Domains\Lookups\Services\CountryService;
use App\Http\Controllers\Controller;

class SubscriptionInfoFrontController extends Controller
{
    /**
     * @var SubscriptionService $subscriptionService
     */
    protected SubscriptionService $subscriptionService;



    /**
     * @var CountryService $countryService
     */
    protected CountryService $countryService;



    /**
     * @var UserService $userService
     */
    protected UserService $userService;

    public function __construct(SubscriptionInfoService $subscriptionInfoService, UserService $userService,CityService $cityService)
    {
        $this->subscriptionInfoService = $subscriptionInfoService;

        $this->userService = $userService;

        $this->cityService = $cityService;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.subscription-info')
            ->withUsers($this->userService->getById(auth()->id()));

    }

    public function store(SubscriptionInfoFrontRequest $request)
    {
        $this->subscriptionInfoService->store($request->validated());
        return redirect()->route('frontend.frontSubscription.confirmation.index');
    }


}
