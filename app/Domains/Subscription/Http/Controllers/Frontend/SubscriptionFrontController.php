<?php
namespace App\Domains\Subscription\Http\Controllers\Frontend;

use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Domains\Subscription\Http\Requests\Frontend\SubscriptionFrontRequest;
use App\Domains\Subscription\Services\SubscriptionService;


use App\Domains\Lookups\Services\CountryService;
use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriptionFrontController extends Controller
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

    public function __construct(SubscriptionService $subscriptionService, UserService $userService,CountryService $countryService)
    {
        $this->subscriptionService = $subscriptionService;

        $this->userService = $userService;

        $this->countryService = $countryService;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countries=$this->countryService->get();
        return view('frontend.user-info',compact('countries'))
            ->withUsers($this->userService->getById(auth()->id()));

    }
    public function emailVerificationIndex()
    {
        return view('frontend.verification-email')
            ->withUsers($this->userService->getById(auth()->id()));

    }
    public function verifyEmail(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'verification_code' => 'required|digits:4',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user && $user->verification_code == $request->verification_code) {
            // Verification successful, update user's verification status
            $user->email_verified_at = now();
            $user->save();

            return redirect()->route('frontend.frontSubscription.mobileVerification.index')->with('success', 'Email verified successfully.');
        }

        return redirect()->back()->with('error', 'Invalid verification code. Please try again.');
    }
    public function resendVerificationCode(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            // Generate a new verification code and update user's code in the database
            $newVerificationCode = mt_rand(1000, 9999); // Generate a 4-digit code
            $user->update(['verification_code' => $newVerificationCode]);

            Mail::to($user->email)->send(new VerificationCodeMail($newVerificationCode));


            return response()->json(['message' => 'Verification code resent successfully.'], 200);
        }

        return response()->json(['message' => 'User not found.'], 404);
    }
    public function mobileVerificationIndex()
    {
        return view('frontend.verification-mobile')
            ->withUsers($this->userService->getById(auth()->id()));

    }
    public function indexConfirmation()
    {
        return view('frontend.confirmation')
            ->withUsers($this->userService->getById(auth()->id()));

    }


    /**
     * @param SubscriptionFrontRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(SubscriptionFrontRequest $request)
    {
        $this->subscriptionService->store($request->validated());
        return redirect()->route('frontend.frontSubscription.confirmation.index');
    }



    public function verifyMobileVerification(\Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|digits:4',
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_code', $request->verification_code)
            ->first();

        if (!$user) {
            return back()->with('error', 'Invalid verification code.');
        }

        // Update user's email_verified_at field
        $user->email_verified_at = now();
        $user->save();

        // Redirect to the next step
        return redirect()->route('frontend.nextStep'); // Replace with the actual route
    }


}
