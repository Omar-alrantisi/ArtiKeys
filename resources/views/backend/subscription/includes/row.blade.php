@php
    $subscribeRating=\App\Domains\Subscription\Models\SubscriberRating::query()->where('user_id',$row->user->id)->first();
@endphp
<x-livewire-tables::bs4.table.cell>
    {{$row->name_en}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->name_ar}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->user->email}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->user->phone_number}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    {{$row->dob}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->personal_image))
        <a href="{{url('storage/subscription/personal_images/'.$row->personal_image)}}" target="_blank">
            <img src="{{url('storage/subscription/personal_images/'.$row->personal_image)}}" width="50" height="50" loading="lazy" />
        </a>
    @else
        @lang('No Image')
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->identification_card))
        <a href="{{url('storage/subscription/identification_card/'.$row->identification_card)}}" target="_blank">
            <img src="{{url('storage/subscription/identification_card/'.$row->identification_card)}}" width="50" height="50" loading="lazy" />
        </a>
    @else
        @lang('No Image')
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(!empty($row->vaccination_certificate))
        <a href="{{url('storage/subscription/vaccination_certificate/'.$row->vaccination_certificate)}}" target="_blank">
            <img src="{{url('storage/subscription/vaccination_certificate/'.$row->vaccination_certificate)}}" width="50" height="50" loading="lazy" />
        </a>
    @else
        @lang('No Image')
    @endif
</x-livewire-tables::bs4.table.cell>

{{--<x-livewire-tables::bs4.table.cell>--}}
{{--    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPoint{{$row->id}}" data-whatever="@mdo">--}}
{{--        <i class="fas fa-edit"></i>   </button>--}}
{{--    <div class="modal fade" id="editPoint{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h5 class="modal-title" id="exampleModalLabel">{{__("Edit Points")}} for {{ $row->name_en }}</h5>--}}
{{--                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                        <span aria-hidden="true">&times;</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <form method="post" action="{{route('admin.subscription.subscription.updateSubscriberRatings')}}">--}}
{{--                        @csrf--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="recipient-name" class="col-form-label">{{__("Mark Test 1")}}</label>--}}
{{--                            <input type="number" value="{{$subscribeRating['mark_test_1']??0}}" class="form-control" id="mark_test_1" name="mark_test_1" required>--}}
{{--                            <label for="recipient-name" class="col-form-label">{{__("Mark Test 2")}}</label>--}}
{{--                            <input type="number" value="{{$subscribeRating['mark_test_1']??0}}" class="form-control" id="mark_test_2" name="mark_test_2" required>--}}
{{--                            <label for="recipient-name" class="col-form-label">{{__("Mark Test 3")}}</label>--}}

{{--                            <input type="number" value="{{$subscribeRating['mark_test_3']??0}}" class="form-control" id="mark_test_3" name="mark_test_3" required>--}}
{{--                            <input type="hidden" class="form-control" value="{{$subscribeRating}}" id="subscriber_rating_id" name="subscriber_rating_id">--}}
{{--                            <input type="hidden" class="form-control" value="{{$row->user->id}}" id="user_id" name="user_id">--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>--}}
{{--                            <button type="submit" class="btn btn-primary">{{__("Update")}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div></div></div>--}}
{{--</x-livewire-tables::bs4.table.cell>--}}
<x-livewire-tables::bs4.table.cell>
    @if (
 $logged_in_user->hasAllAccess() ||
                                      $logged_in_user->can('admin.subscription.updateSubscriberRatingExam1')


                              )
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPoint1-{{$row->id}}" data-whatever="@mdo">
            <i class="fas fa-edit"></i>  Edit Exam 1  </button>
        <div class="modal fade" id="editPoint1-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__("Edit Points For exam 1")}} for {{ $row->name_en }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('admin.subscription.subscription.updateSubscriberRatingExam1')}}">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{__("Mark Test 1")}}</label>
                                <input type="number" value="{{$subscribeRating['mark_test_1']??0}}" class="form-control" id="mark_test_1" name="mark_test_1" required>
                                <input type="hidden" class="form-control" value="{{$subscribeRating}}" id="subscriber_rating_id" name="subscriber_rating_id">
                                <input type="hidden" class="form-control" value="{{$row->user->id}}" id="user_id" name="user_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
                                <button type="submit" class="btn btn-primary">{{__("Update")}}</button>
                            </div>
                        </form>
                    </div>
                </div></div></div>
    @endif
    @if (
    $logged_in_user->hasAllAccess() ||
                                         $logged_in_user->can('admin.subscription.updateSubscriberRatingExam2')


                                 )
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPoint2-{{$row->id}}" data-whatever="@mdo">
            <i class="fas fa-edit"></i>Edit Exam 2   </button>
        <div class="modal fade" id="editPoint2-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__("Edit Points For exam 2")}} for {{ $row->name_en }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('admin.subscription.subscription.updateSubscriberRatingExam2')}}">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{__("Mark Test 2")}}</label>
                                <input type="number" value="{{$subscribeRating['mark_test_2']??0}}" class="form-control" id="mark_test_2" name="mark_test_2" required>
                                <input type="hidden" class="form-control" value="{{$subscribeRating}}" id="subscriber_rating_id" name="subscriber_rating_id">
                                <input type="hidden" class="form-control" value="{{$row->user->id}}" id="user_id" name="user_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
                                <button type="submit" class="btn btn-primary">{{__("Update")}}</button>
                            </div>
                        </form>
                    </div>
                </div></div></div>
    @endif
    @if (
$logged_in_user->hasAllAccess() ||
                                 $logged_in_user->can('admin.subscription.updateSubscriberRatingExam3')


                         )
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editPoint3-{{$row->id}}" data-whatever="@mdo">
            <i class="fas fa-edit"> </i> Edit Exam 3  </button>
        <div class="modal fade" id="editPoint3-{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__("Edit Points For exam 3")}} for {{ $row->name_en }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{route('admin.subscription.subscription.updateSubscriberRatingExam3')}}">
                            @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">{{__("Mark Test 1")}}</label>
                                <input type="number" value="{{$subscribeRating['mark_test_3']??0}}" class="form-control" id="mark_test_3" name="mark_test_3" required>
                                <input type="hidden" class="form-control" value="{{$subscribeRating}}" id="subscriber_rating_id" name="subscriber_rating_id">
                                <input type="hidden" class="form-control" value="{{$row->user->id}}" id="user_id" name="user_id">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__("Close")}}</button>
                                <button type="submit" class="btn btn-primary">{{__("Update")}}</button>
                            </div>
                        </form>
                    </div>
                </div></div></div>
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(!$row->user->subscriptionInfo)
        Not Started
    @else
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#subscribtionInfo{{$row->id}}" data-whatever="@mdo">
            Show   </button>
        <div class="modal fade" id="subscribtionInfo{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__("Subscription Info")}} for {{ $row->name_en }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Education Level</th>
                                <td>{{$row->user->subscriptionInfo->education_level??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Field of study</th>
                                <td>{{$row->user->subscriptionInfo->field_of_study??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Educational Status</th>
                                <td>{{$row->user->subscriptionInfo->educational_status??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Educational Background</th>
                                <td>{{$row->user->subscriptionInfo->education_background??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Arabic Writing Level</th>
                                <td>{{$row->user->subscriptionInfo->arabic_writing??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Arabic Speaking Level</th>
                                <td>{{$row->user->subscriptionInfo->arabic_specking??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">English Writing Level</th>
                                <td>{{$row->user->subscriptionInfo->english_writing??""}}</td>
                            </tr>

                            <tr>
                                <th scope="row">English Speaking Level</th>
                                <td>{{$row->user->subscriptionInfo->english_specking??""}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Full Address</th>
                                <td>{{$row->user->subscriptionInfo->full_address??""}}</td>
                            </tr>

                            <tr>
                                <th scope="row"> here about us</th>
                                <td>{{$row->user->subscriptionInfo->hear_about??""}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div></div></div>
    @endif
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @if(!$row->user->userEnglishTest)
        Not Started
    @else
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#englishTest{{$row->id}}" data-whatever="@mdo">
            Show   </button>
        <div class="modal fade" id="englishTest{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__("English Test")}} for {{ $row->name_en }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if(isset($row->user->userEnglishTest))
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">Education Level</th>
                                    <td>{{$row->user->userEnglishTest->level??""}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Image</th>
                                    <td>
                                        <a href="{{url('storage/englishTest/images/'.$row->user->userEnglishTest->image)}}" target="_blank">
                                            <img src="{{url('storage/englishTest/images/'.$row->user->userEnglishTest->image)}}" width="50" height="50" loading="lazy" />
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div></div></div>
    @endif
</x-livewire-tables::bs4.table.cell>



<x-livewire-tables::bs4.table.cell>
    @if(!$row->user->userEnglishTest)
    @else
    @endif
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#codeChallengeSubmission{{$row->id}}" data-whatever="@mdo">
        Show   </button>
    <div class="modal fade" id="codeChallengeSubmission{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__("Code Challenge Submission")}} for {{ $row->name_en }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if(isset($row->user->codeChallengeSubmission))
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">CSS certificate</th>
                                <td>
                                    <a href="{{url('storage/codeChallengeSubmission/images/css_certificate/'.$row->user->codeChallengeSubmission->css_certificate)}}" target="_blank">
                                        <img src="{{url('storage/codeChallengeSubmission/images/css_certificate/'.$row->user->codeChallengeSubmission->css_certificate)}}" width="50" height="50" loading="lazy" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">HTML certificate</th>
                                <td>
                                    <a href="{{url('storage/codeChallengeSubmission/images/html_certificate/'.$row->user->codeChallengeSubmission->html_certificate)}}" target="_blank">
                                        <img src="{{url('storage/codeChallengeSubmission/images/html_certificate/'.$row->user->codeChallengeSubmission->html_certificate)}}" width="50" height="50" loading="lazy" />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">JS certificate</th>
                                <td>
                                    <a href="{{url('storage/codeChallengeSubmission/images/js_certificate/'.$row->user->codeChallengeSubmission->js_certificate)}}" target="_blank">
                                        <img src="{{url('storage/codeChallengeSubmission/images/js_certificate/'.$row->user->codeChallengeSubmission->js_certificate)}}" width="50" height="50" loading="lazy" />
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div></div></div>
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    <div class="form-check form-switch">
        <input value="{{ old($row->status) ?? ($row->status == "0")?"0":"1"}}" {{$row->status == "1" ? 'checked' : ''}} class="form-check-input " type="checkbox" role="switch" name="status" id="flexSwitchCheckDefault" onchange="changeCheckBox({{$row->id}})"  {{$row->status == "1" ? 'checked' : ''}}>
    </div>

</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell>
    @include('backend.subscription.includes.actions', ['model' => $row])
</x-livewire-tables::bs4.table.cell>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
@push('after-scripts')
    <script>
        function changeCheckBox(id){
            debugger
            $.ajax({
                url : '{{route('admin.subscription.subscription.updateStatusBySubscriberId')}}?'+'userId='+id,
                type:'GET',
                async : false,
                success:function(data){
                    if(data){
                    }
                },
                error:function (xhr){
                    alert(xhr.message);
                }
            })
        }
    </script>
@endpush
