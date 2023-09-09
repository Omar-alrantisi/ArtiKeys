<?php

namespace App\Http\Middleware;

use App\Domains\Subscription\Services\BusinessService;
use Closure;
use Illuminate\Http\Request;

class HasBusiness
{

    /**
     * @var BusinessService $businessService
     */
    protected BusinessService $businessService;

    /**
     * @param BusinessService $businessService
     */
    public function __construct(BusinessService $businessService)
    {
        $this->businessService = $businessService;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {

        if(count($this->businessService->where('user_id','=',auth()->id())->get())){
            return $next($request);

        }
        return redirect('frontSubscription/business');


    }
}
