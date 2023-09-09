<?php

namespace App\Domains\Auth\Http\Controllers\Frontend\Auth;

use App\Domains\Auth\Http\Requests\Frontend\Auth\UpdateEmailRequest;
use App\Domains\Auth\Http\Requests\Frontend\Auth\UpdatePasswordRequest;
use App\Domains\Auth\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class UpdateEmailController.
 */
class UpdateEmailController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * ChangePasswordController constructor.
     *
     * @param  UserService  $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @param  UpdatePasswordRequest  $request
     * @return mixed
     *
     * @throws \Throwable
//     */
//    public function update(UpdateEmailRequest $request,$user)
//    {
//
//        $this->userService->updateEmail($user, $request->validated());
//
//        return redirect()->route('frontend.frontSubscription.confirmation.index');
//    }

    public function update(UpdateEmailRequest $request)
    {
        $email = $request->input('email');
        DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update([
                'email' => $email
            ]);
        DB::table('businesses')
            ->where('user_id', '=', Auth::user()->id)
            ->update([
                'business_email' => $email
            ]);

     return   redirect()->back()->with(['successSaved' => 'Your email has been saved']);
    }
}
