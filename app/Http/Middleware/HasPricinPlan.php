<?php

namespace App\Http\Middleware;

use App\Domains\Subscription\Models\Subscription;
use App\Domains\Subscription\Services\SubscriptionService;
use Closure;
use Illuminate\Http\Request;

class HasPricinPlan
{
    /**
     * @var SubscriptionService $subscriptionService
     */
    protected SubscriptionService $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;

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

        if(count($this->subscriptionService->where('user_id','=',auth()->id())->get())){
            return $next($request);
        }
        return redirect('frontSubscription/pricingPlans');

    }
}
