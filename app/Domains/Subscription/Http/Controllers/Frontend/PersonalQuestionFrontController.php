<?php
namespace App\Domains\Subscription\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Domains\Lookups\Services\CityService;
use App\Domains\Subscription\Http\Requests\Frontend\PersonalQuestionFrontRequest;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionFrontRequest;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionInfoFrontRequest;
use App\Domains\Subscription\Models\PersonalQuestion;
use App\Domains\Subscription\Services\PersonalQuestionService;
use App\Domains\Subscription\Services\SubscriptionInfoService;
use App\Domains\Subscription\Services\SubscriptionService;


use App\Domains\Lookups\Services\CountryService;
use App\Http\Controllers\Controller;

class PersonalQuestionFrontController extends Controller
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

    public function __construct(PersonalQuestionService $personalQuestionService, UserService $userService)
    {
        $this->personalQuestionService = $personalQuestionService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.personal-question')
            ->withUsers($this->userService->getById(auth()->id()));

    }

    public function store(PersonalQuestionFrontRequest $request)
    {
        $this->personalQuestionService->store($request->validated());
        return redirect()->route('frontend.frontSubscription.confirmation.index');
    }


}
