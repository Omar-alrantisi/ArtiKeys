<?php

namespace App\Http\Middleware;

use App\Domains\Auth\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckVerify
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(Request): (Response|RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var User $user */
        $user = auth()->user();

        if ($user->type === "user") {
            $emailVerificationRoutes = [
                'frontend.frontSubscription.emailVerification.index',
                'frontend.frontSubscription.emailVerification.verify',
                'frontend.frontSubscription.emailVerification.resendVerificationCode',
            ];

            $mobileVerificationRoutes = [
                'frontend.frontSubscription.mobileVerification.index',
                'frontend.frontSubscription.mobileVerification.store',
                'frontend.frontSubscription.mobileVerification.verify',
            ];

            $subscriptionRoutes = [
                'frontend.frontSubscription.subscribe.index',
                'frontend.frontSubscription.subscribe.store',
            ];

            if (!$user->email_verified_at && !in_array($request->route()->getName(), $emailVerificationRoutes)) {
                return redirect()->route('frontend.frontSubscription.emailVerification.index');
            }

            // Only proceed to mobile verification if email is verified
            if ($user->email_verified_at && !$user->phone_number_verified_at && !in_array($request->route()->getName(), $mobileVerificationRoutes)) {
                return redirect()->route('frontend.frontSubscription.mobileVerification.index');
            }

            // Only proceed to subscription if email and mobile are verified
            if ($user->email_verified_at && $user->phone_number_verified_at && !isset($user->subscription) && !in_array($request->route()->getName(), $subscriptionRoutes)) {
                return redirect()->route('frontend.frontSubscription.subscribe.index');
            }
        }

        return $next($request);
    }
}
