<?php
namespace App\Domains\Subscription\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Domains\Lookups\Services\CityService;
use App\Domains\Subscription\Http\Requests\Frontend\PersonalQuestionFrontRequest;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionFrontRequest;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionInfoFrontRequest;
use App\Domains\Subscription\Http\Requests\Frontend\UserEnglishTestFrontRequest;
use App\Domains\Subscription\Models\PersonalQuestion;
use App\Domains\Subscription\Services\PersonalQuestionService;
use App\Domains\Subscription\Services\SubscriptionInfoService;
use App\Domains\Subscription\Services\SubscriptionService;


use App\Domains\Lookups\Services\CountryService;
use App\Domains\Subscription\Services\UserEnglishTestService;
use App\Http\Controllers\Controller;

class UserEnglishTestFrontController extends Controller
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

    public function __construct(UserEnglishTestService $userEnglishTestService, UserService $userService)
    {
        $this->userEnglishTestService = $userEnglishTestService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return redirect()->route('frontend.frontSubscription.englishTest.exam.form');

    }

    public function store(UserEnglishTestFrontRequest $request)
    {
        $this->userEnglishTestService->store($request->validated());
        return redirect()->route('frontend.frontSubscription.confirmation.index');
    }


}
