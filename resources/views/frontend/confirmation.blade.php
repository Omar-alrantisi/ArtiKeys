

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
    </style>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card bg-dark text-white p-4">
                    <h5 class="card-title">Your Section</h5>
                    <p class="card-text">You have to complete all sections below to enable submit your application.</p>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a href="{{route('frontend.frontSubscription.subscribeInfo.index')}}">
                            <div class="card text-dark bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i style="font-size: 50px" class="fa fa-user" aria-hidden="true"></i>

                                        <div class="mx-5">
                                            <h6 class="card-title">Personal Information</h6>
                                            <p class="card-text">We need your data to complete our filtration</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">

                                        <i class=""></i>
                                        @if(isset($users->subscriptionInfo))
                                            <div class="text-success">Status: Completed</div>
                                        @else
                                            <div class="text-danger">Status: Not Started</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="{{route('frontend.frontSubscription.personalQuestion.index')}}">

                            <div class="card text-dark bg-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i style="font-size: 50px" class="fa fa-question-circle" aria-hidden="true"></i>

                                        <div class="mx-5">
                                            <h6 class="card-title">Questionnaire</h6>
                                            <p class="card-text">A bunch of questions of your interest in coding</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <i class=""></i>
                                        @if(isset($users->personalQuestion))
                                            <div class="text-success">Status: Completed</div>
                                        @else
                                            <div class="text-danger">Status: Not Started</div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="{{route('frontend.frontSubscription.englishTest.index')}}">

                                <div class="card text-dark bg-light">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 50px" class="fa fa-globe"></i>
                                            <div class="mx-5">
                                                <h6 class="card-title">English Test</h6>
                                                <p class="card-text">Test your english level,it is on time submission</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">

                                            <i class=""></i>
                                            @if(isset($users->userEnglishTest))
                                                <div class="text-success">Status: Completed</div>
                                            @else
                                                <div class="text-danger">Status: Not Started</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-12 mb-3">
                            <a href="{{route('frontend.frontSubscription.codeChallenge.index')}}">

                                <div class="card text-dark bg-light">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <i style="font-size: 50px" class="fa fa-code"></i>
                                            <div class="mx-5">
                                                <h6 class="card-title">Code Challenge</h6>
                                                <p class="card-text">Start to learning the code,it is on time submission</p>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <i style="font-size: 50px" class=""></i>
                                            @if(isset($users->codeChallengeSubmission))
                                                <div class="text-success">Status: Completed</div>
                                            @else
                                                <div class="text-danger">Status: Not Started</div>
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
            <div class="col-lg-4 " style="margin-top: 7rem">
                <div class="mt-5">
                    <p style="font-size: 24px;font-weight: 600">Welcome <span> {{ explode(' ', $users->subscription->name_en)[0] }}</span>!</p>
                    <p style="font-size: 18px"><span style="font-weight: 700">Email:</span> {{$users->email}}</p>
                    <p style="font-size: 18px"><span style="font-weight: 700">Mobile: </span>{{$users->phone_number}}</p>
                    <p style="font-size: 18px"><span style="font-weight: 700">Application Status:</span> In Progress</p>
                    <p>
                        <span>
                            Don't Worry, You Still Have Time To Login Again Many
                          Times.And To Complete All The Requirements Until ../../../
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Font Awesome (for icons) and Bootstrap JS scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5"></script>

@endsection
