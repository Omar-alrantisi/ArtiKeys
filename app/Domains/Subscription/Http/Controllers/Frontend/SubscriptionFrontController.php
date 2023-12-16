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
use Illuminate\Support\Facades\Http;


use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;
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
        // Get the authenticated user
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'User not authenticated.');
        }

        $authToken = $this->getOrangeIntegrationToken();

        if(!$authToken){
            return redirect()->route('login')->with('error',);
        }

        // Send the verification code via the Orange Bulk SMS API
        $response = Http::withHeaders([
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
            'integration_token' => $authToken,
        ])->post('https://orangebulksms.orange.jo/api/job/2fa/send', [
            'to' => $user->phone_number, // Replace with the actual field storing the user's phone number
            'body' => "Hello, please use code: {code} to confirm registration",
            'from' => 'Mujaddidun',
            'service' => 'test the orange',
        ]);



        // Check if the request was successful
        if ($response->successful()) {

            $responseData = $response->json();
            // Save the verification code and request ID in the database or session for later verification
            $request_id = $responseData['requestID'];
            // Save $verificationCode and $verificationRequestId in your storage mechanism (e.g., database, session)

            return view('frontend.verification-mobile', compact('user','request_id','authToken'))
                ->with('success', 'Verification code sent successfully.');
        } else {
            // Handle the case when the SMS sending fails
            return redirect()->back()->with('error', 'Failed to send verification code.');
        }
    }

    public function checkVerificationCode(Request $request)
    {
        /** @var User $user */
        $user = User::find(auth()->user()->id);

        $request_id = $request->input('request_id');
        $code = $request->input('verification_code');
        $authToken = $request->input('authToken');

        // Check the verification code using the Orange Bulk SMS API
        $response = Http::withHeaders([
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
            'integration_token' => $authToken,
        ])->post('https://orangebulksms.orange.jo/api/job/2fa/verify', [
            'requestId' => $request_id,
            'code' => $code,
        ]);

        // Check if the request was successful
        if ($response->json()['code']===200) {
            $user->update(["phone_number_verified_at" =>now()]);

            // Verification successful
            return redirect()->route('frontend.frontSubscription.subscribe.index')->with('success', 'Verification successful.');
        } else {
            // Verification failed
            return view('frontend.verification-mobile', compact('user','request_id','authToken'))
                ->with('error', 'Invalid verification code.');
        }
    }

    private function getOrangeIntegrationToken()
    {
        // Make a request to the Orange Bulk SMS API to get the integration token
        $response = Http::withHeaders([
            'Connection' => 'keep-alive',
            'Accept-Encoding' => 'gzip, deflate, br',
            'username' => 'Mujaddidun',
            'password' => 'Orange@2024',
        ])->post('https://orangebulksms.orange.jo/api/user/generateIntegrationToken');

        // Check if the request was successful
        if ($response->successful()) {
            $responseData = $response->json()["result"];
            return $responseData["integrationToken"];
        } else {
            // Handle the case when getting the integration token fails
            // You might want to log the error or throw an exception
            return null;
        }
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
