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

        <form action="{{ route('frontend.frontSubscription.mobileVerification.verify') }}" method="post"
              class="email-verification-form mt-5 mb-5">
            @csrf
            @include('includes.partials.messages')

            <div class="mb-3">
                <p class="email-verification-p">
                    A verification code has been dispatched via SMS to:
                </p>
                <p class="email-verification-p">
                    {{ $user->phone_number }}
                </p>
                <p class="email-verification-p-2">
                    Please input the 6-digit verification code:<span>*</span>
                </p>
                <input class="verification-input" type="number" name="verification_code" min="100000" max="999999" step="1"
                       placeholder="######" required>
                <input class="verification-input" type="hidden" name="request_id" value="{{ $request_id }}">
                <input class="verification-input" type="hidden" name="authToken" value="{{ $authToken }}">
                <p class="email-verification-p-3" id="resend-message">
                    @if(!session('resendDisabled'))
                        You can resend the code in
                        <span id="resend-timer">1:00</span> minutes.
                        <a href="{{ route('frontend.frontSubscription.mobileVerification.index') }}">Resend Code</a>
                    @else
                        Resend functionality is disabled. Try again later.
                    @endif
                </p>

                <button id="verify_btn" type="submit" class="btn-primary">
                    <i class="fas fa-check-circle"></i> Confirm
                </button>
            </div>
        </form>
    </div>
@endsection

@section('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous"></script>
    <script>
        let resendTimer = 60; // Resend timer in seconds

        // Function to update the resend timer display
        function updateResendTimer() {
            const minutes = Math.floor(resendTimer / 60);
            const seconds = resendTimer % 60;
            const formattedTime = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
            $('#resend-timer').text(formattedTime);
        }

        // Initial update of the resend timer
        updateResendTimer();

        // Function to handle the resend button click
        function resendCode() {
            // Add logic here to trigger the resend functionality
            // For example, make an AJAX request to the server to resend the code

            // Disable the button and start the timer
            $('#resend-message').show();
            $('#resend-timer').show();
            $('#verify_btn').prop('disabled', true);

            const intervalId = setInterval(() => {
                resendTimer--;

                if (resendTimer <= 0) {
                    clearInterval(intervalId);
                    $('#resend-message').hide();
                    $('#verify_btn').prop('disabled', false);
                }

                updateResendTimer();
            }, 1000);
        }

        // Attach the click event handler to the Resend Code link
        $('#resend-message a').on('click', function (e) {
            e.preventDefault();
            resendCode();
        });

        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: "{{__("Invalid verification code.")}}",
            background: '#1c1c1c',
            button:"Okss"
        })
        @endif
    </script>
@endsection
