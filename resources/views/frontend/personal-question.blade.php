@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <h5 class="card-title mt-5">Questionnaire Section</h5>
            <form action="{{route('frontend.frontSubscription.personalQuestion.store')}}" method="POST" class="user-info-form" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    @include('includes.partials.messages')
                    <div class="row">
                        <div class="col-md-12">
                            <label for="user_interest_join" class="form-label mt-3">1. Introduce Yourself
                                - Tell us more about who you are.
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="about_user" id="about_user" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->about_user}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="user_interest_join" class="form-label mt-3">2. Motivation for RPA Training:
                                - What motivates your interest in joining ArtiKeys Company's RPA Training?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_interest_join" id="user_interest_join" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_interest_join}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="about_user" class="form-label mt-3">3. Programming Skills:
                                - Have you gained skills in any programming languages in the past?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_interest_join" id="user_interest_join" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_interest_join}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="user_interest_join" class="form-label mt-3">4. Interest in RPA Development:
                                - What ignited your curiosity about learning RPA development?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_interest_join" id="user_interest_join" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_interest_join}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="developer_do" class="form-label mt-3">5. RPA Developer Responsibilities:
                                - From your perspective, what tasks does a typical RPA developer handle?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="developer_do" id="developer_do" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->developer_do}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="successful_developer" class="form-label mt-3">6. Success in RPA Development:
                                - What personal qualities, in your opinion, lead to success in RPA development?<span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="successful_developer" id="successful_developer" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->successful_developer}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="use_web_skills" class="form-label mt-3">7. Application of Skills:
                                - How do you plan to apply your RPA development skills post-training?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="use_web_skills" id="use_web_skills" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->use_web_skills}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="about_user" class="form-label mt-3">8. Professional Vision:
                                - Where do you envision yourself professionally in the next five years?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_after_5_years" id="user_after_5_years" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_after_5_years}} @endif</textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="user_benefit" class="form-label mt-3">9. Contributions to Cohort:
                                - How do you plan to positively contribute to the third cohort?
                                <span>*</span></label>
                            <textarea @if(isset($users->personalQuestion))  disabled @endif name="user_benefit" id="user_benefit" class="form-control" required>@if(isset($users->personalQuestion))  {{$users->personalQuestion->user_benefit}} @endif</textarea>
                        </div>
                    </div>
                    </div>
                    <button id="signup_btn " type="submit" class="btn btn-primary btn-sm w-25 mt-5 @if(isset($users->personalQuestion))  d-none @endif">Save</button>
            </form>
    </div>
@endsection
