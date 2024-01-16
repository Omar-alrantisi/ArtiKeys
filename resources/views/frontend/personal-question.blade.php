@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h5 class="card-title">Questionnaire Section</h5>
            <form action="{{route('frontend.frontSubscription.personalQuestion.store')}}" method="POST" class="user-info-form" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    @include('includes.partials.messages')
                    <div class="row">
                        <div class="col-md-12">
                            <label for="about_user" class="form-label mt-3">1.Tell us about your self<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="about_user" id="about_user" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->about_user}} @endif </textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="user_interest_join" class="form-label mt-3">2.why you interested in joining<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_interest_join" id="user_interest_join" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_interest_join}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="about_user" class="form-label mt-3">3.Have you ever learned any programming languages before? <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_interest_join" id="user_interest_join" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_interest_join}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="user_interest_join" class="form-label mt-3">4.why are you interested in learning web development<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_interest_join" id="user_interest_join" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_interest_join}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="developer_do" class="form-label mt-3">5.in you opinion what does a web developer do<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="developer_do" id="developer_do" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->developer_do}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="successful_developer" class="form-label mt-3">6.what qualities do you think you need to be successful as a web developer<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="successful_developer" id="successful_developer" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->successful_developer}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="use_web_skills" class="form-label mt-3">7.How will you use your web development skills after the end of the training <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="use_web_skills" id="use_web_skills" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->use_web_skills}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="about_user" class="form-label mt-3">8.where do you see yourself in 5 years <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_after_5_years" id="user_after_5_years" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_after_5_years}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="user_benefit" class="form-label mt-3">9.what benefits would you bring to the third cohort?<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_benefit" id="user_benefit" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_benefit}} @endif</textarea>
                        </div>
                    </div>
                    </div>
                    <button id="signup_btn " type="submit" class="btn btn-primary btn-sm w-25 mt-5 @if(isset($users->personalQuestion))  d-none @endif">Save</button>
            </form>
    </div>
@endsection
