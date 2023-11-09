@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container">
        <br /><br />
    <ul class="list-unstyled multi-steps">
        <li>Sign Up</li>
        <li>Email Confirmation</li>
        <li class="is-active">Mobile Confirmation</li>
        <li>Finish</li>
    </ul>
        <form action="{{route('frontend.frontSubscription.subscribe.index')}}" method="get" class="email-verification-form mt-5 mb-5">
            <div class="mb-3">
                <p class="email-verification-p">
                    A verification code has been dispatched via SMS to:
                </p>
                <p class="email-verification-p">
                    {{$user->phone_number}}
                </p>
                <p class="email-verification-p-2">
                    Please input the 4-digit verification code:<span>*</span>
                </p>
                <input class="verification-input" type="number" name="verification_code" min="1000" max="9999" step="1" placeholder="1234" required>
                <p class="email-verification-p-3">If you haven't received the verification code, you can <a href="#">Resend Code</a></p>

                <button id="verify_btn" type="submit" class="btn-primary">
                    <i class="fas fa-check-circle"></i> Confirm
                </button>
            </div>
        </form>
    </div>

@endsection
