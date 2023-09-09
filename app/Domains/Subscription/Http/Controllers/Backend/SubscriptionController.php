<?php

namespace App\Domains\Subscription\Http\Controllers\Backend;

use App\Domains\Subscription\Http\Requests\Backend\SubscriptionRequest;
use App\Domains\Subscription\Models\Subscription;
use App\Domains\Subscription\Services\SubscriptionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscriptionController extends Controller
{
    /**
     * @var SubscriptionService $subscriptionService
     */
    protected SubscriptionService $subscriptionService;

    /**
     * @param SubscriptionService $subscriptionService
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.subscription.index');
    }

    /**
     * @param Subscription $subscription
     * @return mixed
     */
    public function edit(Subscription $subscription)
    {
        return view('backend.subscription.business.edit')
            ->withSubscription($subscription);
    }

    /**
     * @param SubscriptionRequest $request
     * @param $subscription
     * @return mixed
     * @throws \Exception
     */
    public function update(SubscriptionRequest $request, $subscription)
    {
        $this->subscriptionService->update($subscription,$request->validated());
        return redirect()->back()->withFlashSuccess(__('The Subscription was successfully updated'));
    }

    public function destroy($subscription)
    {
        $this->subscriptionService->destroy($subscription);
        return redirect()->back()->withFlashSuccess(__('The Subscription was successfully deleted.'));
    }
    public function updateSubscriberRatings(Request $request)
    {
        $markTest1 = $request->input('mark_test_1');
        $markTest2 = $request->input('mark_test_2');
        $markTest3 = $request->input('mark_test_3');
        $subscriberRatingId = $request->input('subscriber_rating_id');

        $subscriberRating = DB::table('subscriber_ratings')->where('user_id',$request->input('user_id'))->first();
//        echo $subscriberRating->id;exit();

        if (!$subscriberRating) {
            // If subscriberRatingId is not found, create a new record
            $newSubscriberRatingId = DB::table('subscriber_ratings')->insertGetId([
                'user_id' =>$request->input('user_id'), // Assuming you have a logged-in user
                'mark_test_1' => $markTest1,
                'mark_test_2' => $markTest2,
                'mark_test_3' => $markTest3??0,
                'created_by_id' => auth()->user()->id,
                'updated_by_id' => auth()->user()->id
            ]);

            return redirect()->back()->withFlashSuccess(__('New rating was created and saved'));
        } else {
            // If subscriberRatingId is found, update the existing record
            DB::table('subscriber_ratings')
                ->where('user_id',$request->input('user_id'))
                ->update([
                    'mark_test_1' => $markTest1,
                    'mark_test_2' => $markTest2,
                    'mark_test_3' => $markTest3
                ]);

            return redirect()->back()->withFlashSuccess(__('The Mark was successfully updated'));
        }
    }
    public function updateSubscriberRatingExam1(Request $request)
    {
        $markTest1 = $request->input('mark_test_1');
        $subscriberRatingId = $request->input('subscriber_rating_id');
        $subscriberRating = DB::table('subscriber_ratings')->where('user_id',$request->input('user_id'))->first();
        if (!$subscriberRating) {
            // If subscriberRatingId is not found, create a new record
            $newSubscriberRatingId = DB::table('subscriber_ratings')->insertGetId([
                'user_id' =>$request->input('user_id'), // Assuming you have a logged-in user
                'mark_test_1' => $markTest1,
                'created_by_id' => auth()->user()->id,
                'updated_by_id' => auth()->user()->id
            ]);

            return redirect()->back()->withFlashSuccess(__('New rating was created and saved'));
        } else {
            // If subscriberRatingId is found, update the existing record
            DB::table('subscriber_ratings')
                ->where('user_id',$request->input('user_id'))
                ->update([
                    'mark_test_1' => $markTest1,
                ]);

            return redirect()->back()->withFlashSuccess(__('The Mark was successfully updated'));
        }
    }  public function updateSubscriberRatingExam2(Request $request)
    {
        $markTest2 = $request->input('mark_test_2');
        $subscriberRatingId = $request->input('subscriber_rating_id');
        $subscriberRating = DB::table('subscriber_ratings')->where('user_id',$request->input('user_id'))->first();
        if (!$subscriberRating) {
            // If subscriberRatingId is not found, create a new record
            $newSubscriberRatingId = DB::table('subscriber_ratings')->insertGetId([
                'user_id' =>$request->input('user_id'), // Assuming you have a logged-in user
                'mark_test_2' => $markTest2,
                'created_by_id' => auth()->user()->id,
                'updated_by_id' => auth()->user()->id
            ]);

            return redirect()->back()->withFlashSuccess(__('New rating was created and saved'));
        } else {
            // If subscriberRatingId is found, update the existing record
            DB::table('subscriber_ratings')
                ->where('user_id',$request->input('user_id'))
                ->update([
                    'mark_test_2' => $markTest2,
                ]);

            return redirect()->back()->withFlashSuccess(__('The Mark was successfully updated'));
        }
    }
    public function updateSubscriberRatingExam3(Request $request)
    {
        $markTest3 = $request->input('mark_test_3');
        $subscriberRatingId = $request->input('subscriber_rating_id');
        $subscriberRating = DB::table('subscriber_ratings')->where('user_id',$request->input('user_id'))->first();
        if (!$subscriberRating) {
            // If subscriberRatingId is not found, create a new record
            $newSubscriberRatingId = DB::table('subscriber_ratings')->insertGetId([
                'user_id' =>$request->input('user_id'), // Assuming you have a logged-in user
                'mark_test_3' => $markTest3,
                'created_by_id' => auth()->user()->id,
                'updated_by_id' => auth()->user()->id
            ]);

            return redirect()->back()->withFlashSuccess(__('New rating was created and saved'));
        } else {
            // If subscriberRatingId is found, update the existing record
            DB::table('subscriber_ratings')
                ->where('user_id',$request->input('user_id'))
                ->update([
                    'mark_test_3' => $markTest3,
                ]);

            return redirect()->back()->withFlashSuccess(__('The Mark was successfully updated'));
        }
    }
    public function updateStatus(Request $request)
    {
        $this->subscriptionService->updateStatus($request->input('userId'));
        return response()->json(true);
    }


}
