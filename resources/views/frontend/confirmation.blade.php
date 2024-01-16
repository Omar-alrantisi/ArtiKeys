

@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        a{
            text-decoration: none;
        }
        .bg-primary{
            background-color: #002FC2 !important;
        }
        i{
            color: #002FC2 !important;

        }



    </style>
    <div class="container text-center mt-5">
        @include('includes.partials.messages')
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-primary shadow"> <!-- Added shadow -->
                    <div class="card-body confirmation-card">
                        <h3 class="card-title mt-2" style="color: #002FC2;">Welcome, {{ explode(' ', $users->subscription->name_en)[0] }}!</h3>
                        <div class="d-flex justify-content-center text-left">
                            @if(isset($users->subscription->personal_image))
                                <img src="{{url('storage/subscription/personal_images/'.$users->subscription->personal_image)}}" alt="Profile Image" class="rounded-circle" width="150">
                            @endif
                                <div class="mb-2">
                                    <i class="fas fa-envelope" style="margin-right: 10px;"></i>
                                    <span>Email:</span> {{$users->email}}
                                </div>
                                <div class="mb-2">
                                    <i class="fas fa-mobile-alt" style="margin-right: 10px;"></i>
                                    <span>Mobile:</span> {{$users->phone_number}}
                                </div>
                                <div class="mb-2">
                                    <i class="fas fa-user" style="margin-right: 10px;"></i>
                                    <span>ID:</span> {{$users->id}}
                                </div>
                                <div class="mb-2">
                                    {{--                                <i class="fas fa-cogs" style="margin-right: 10px; color: green;">--}}
                                    <i class="fas fa-check-circle" style="margin-right: 10px; color: green;"></i>

                                    {{--                                </i> <!-- Added a checkmark icon for "In Progress" status -->--}}
                                    <span>Status:</span> In Progress
                                </div>
                        </div>
                        <p class="text-center mt-4">
                    <span>
Don't fret! You have the flexibility to log in as many times as you need. You can work on completing all the requirements at your own pace, ensuring you meet every milestone on your journey to success. Your progress is in your hands, and remember, you still have until [insert deadline date] to complete everything before the deadline!                    </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12">
                <div class="card bg-primary text-white p-4">
                    <h5 class="card-title">Your Section</h5>
                    <p class="card-text">To unlock the power of your application, conquer each of the sections below. Your journey to success begins by conquering these challenges, paving the way for your application's triumphant submission.</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="{{route('frontend.frontSubscription.subscribeInfo.index')}}">
                            <div class="card text-dark bg-light h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <i style="font-size: 50px" class="fas fa-id-card-alt" aria-hidden="true"></i>

                                        <div class="mx-5">
                                            <h6 class="card-title">Your Identity</h6>
                                            <p class="card-text">We rely on your valuable information to fine-tune our filtering process and deliver a tailored experience just for you.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">

                                        <i class=""></i>
                                        @if(isset($users->subscriptionInfo))
                                            <div class=""><i class="fas fa-check-circle text-success"></i> Completed</div>
                                        @else
                                            <div class=""><i class="fas fa-circle text-danger"></i> Not Started</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{route('frontend.frontSubscription.personalQuestion.index')}}">

                            <div class="card text-dark bg-light h-100">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <i style="font-size: 50px" class="fas fa-lightbulb"></i>
                                        <div class="mx-5">
                                            <h6 class="card-title">Coding Insights</h6>
                                            <p class="card-text">Dive into the world of coding with thought-provoking questions designed to illuminate your coding journey.</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <i class=""></i>
                                        @if(isset($users->personalQuestion))
                                            <div class=""><i class="fas fa-check-circle text-success"></i> Completed</div>
                                        @else
                                            <div class=""><i class="fas fa-circle text-danger mt-4"></i> Not Started</div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{route('frontend.frontSubscription.englishTest.index')}}">

                                <div class="card text-dark bg-light h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <i style="font-size: 50px" class="fas fa-language"></i>
                                            <div class="mx-5">
                                                <h6 class="card-title">Language Proficiency Challenge</h6>
                                                <p class="card-text">Embark on a journey to test and enhance your English language skills with our timely submission challenge.</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">

                                            <i class=""></i>
                                            @if(isset($users->exams))
                                                <div class=""><i class="fas fa-check-circle text-success"></i> Completed</div>
                                            @else
                                                <div class=""><i class="fas fa-circle text-danger"></i> Not Started</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="{{route('frontend.frontSubscription.codeChallenge.index')}}">

                                <div class="card text-dark bg-light h-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <i style="font-size: 50px"  class="fas fa-laptop-code"></i>
                                            <div class="mx-5">
                                                <h6 class="card-title">Code Mastery Journey</h6>
                                                <p class="card-text">Embark on a learning adventure as you explore the world of coding through our timely submission challenge.</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <i style="font-size: 50px" class=""></i>
                                            @if(isset($users->codeChallengeSubmission))
                                                <div class=""><i class="fas fa-check-circle text-success"></i> Completed</div>
                                            @else
                                                <div class=""><i class="fas fa-circle text-danger"></i> Not Started</div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- Repeat similar structure for other cards -->
                    </div>
{{--                    <button class="btn btn-primary mt-3">Submit</button>--}}
                </div>
            </div>

        </div>
    </div>


@endsection
