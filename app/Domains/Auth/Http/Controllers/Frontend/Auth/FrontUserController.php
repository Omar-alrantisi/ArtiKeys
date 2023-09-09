<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\UserRequest;
use App\Domains\Auth\Models\User;
use App\Domains\Auth\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationCodeMail; // Create this Mail class

class FrontUserController extends Controller
{

    /**
     * @var UserService $userService
     */
    protected UserService $userService;



    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }


    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable.
     */
    public function store(UserRequest $request)
    {
        $user = $this->userService->registerUser($request->validated());
        $verificationCode = mt_rand(1000, 9999);
        $user->verification_code = $verificationCode;
        $user->save();

        // Send the verification code to the user's email
        Mail::to($user->email)->send(new VerificationCodeMail($verificationCode));
        auth()->attempt([
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'password' => $request->input('password')
        ]);
        return redirect()->route('frontend.frontSubscription.emailVerification.index');
    }

    public function validateEmail(Request $request){
        $userCount = User::where('email', $request->input('email'))->count();
        if($userCount == 0){
            $return =  false;
        }
        else{
            $return= true;
        }
        echo json_encode($return); exit;
    }

}
