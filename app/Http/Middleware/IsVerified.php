<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class IsVerified
{
    /**
     * @param $request
     * @param Closure $next
     * @param null $redirectToRoute
     * @return \Illuminate\Http\RedirectResponse|mixed|void
     */
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() ||
            ($request->user() instanceof MustVerifyEmail &&
                ! $request->user()->hasVerifiedEmail())) {
            return redirect()->route('frontend.index');
        }

        return $next($request);
    }
}
