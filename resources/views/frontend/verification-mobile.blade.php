@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <h4  class="text-center mt-5">Welcome! {{$users->email}} </h4>
        <form action="{{route('frontend.frontSubscription.subscribe.index')}}" method="get" class="email-verification-form mt-5">
            <div class="mb-3">

                <h5 class="step-name"><span class="step-name-part-1 mx-3">step <span>2</span>/3</span>Mobile Verification</h5>
                <hr>
                <p class="email-verification-p">
                    A verification code has been sent via sms to:
                </p>
                <p class="email-verification-p">
                    0787318813
                </p>
                <p class="email-verification-p-2">
                    Enter verification code (from 4 digits)<span>*</span>
                </p>
                <input class="verification-number" type="number" min="1000" max="9999" step="1" placeholder="1234">
                <p class="email-verification-p-3"> Didn't get the verification code,<a href="#"> Resend Code</a></p>

                <button id="signup_btn" type="submit" class="btn btn1 btn-primary">Verify</button>
        </form>
@endsection
