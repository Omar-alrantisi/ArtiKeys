@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
{{--    <h4 class="text-center mt-5">Welcome! {{$users->email}} </h4>--}}
    <div class="container">
        <br /><br />
        <ul class="list-unstyled multi-steps">
            <li>Sign Up</li>
            <li class="is-active">Email Confirmation</li>
            <li>Mobile Confirmation</li>
            <li>Finish</li>
        </ul>


    <form action="{{ route('frontend.frontSubscription.emailVerification.verify') }}" method="post" class="email-verification-form mt-5 mb-5">

        @csrf
        @include('includes.partials.messages')
        <p class="email-verification-p">
            A verification code has been dispatched to the email address: {{ auth()->user()->email }}
        </p>
        <p class="email-verification-p-2">
            Please input the 4-digit verification code: <span>*</span>
        </p>
        <input  type="hidden" name="email" value="{{ auth()->user()->email }}">
        <input class="verification-input" type="number" name="verification_code" min="1000" max="9999" step="1" placeholder="1234" required>
        <p class="email-verification-p-3">
            I haven't received the verification code,
            <a href="#" id="resendCodeLink">please send it again.</a>
        </p>
        <p class="note">
            If you're unable to locate your confirmation/reset password email in your primary inbox, it's advisable to check your spam or junk mail folder.
        </p>
        <button id="verify_btn" type="submit" class="btn-primary">
            <i class="fas fa-check-circle"></i> Confirm
        </button>
    </form>
    </div>
    <!-- Add Bootstrap tooltips script for hint on hover -->
    <script>
        $(function () {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous"></script>

@section('after-scripts')
    <script>
        @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: "{{__("Invalid verification code.")}}",
            background: '#1c1c1c',
            button:"Okss"
        })
    @endif

        // JavaScript function to resend verification code
        function resendVerificationCode() {
            var email = "{{ auth()->user()->email }}"; // Get user's email dynamically
            // Use AJAX to send a request to the server to resend the code
            $.ajax({
                type: "POST",
                url: "{{ route('frontend.frontSubscription.emailVerification.resendVerificationCode') }}", // Replace with the actual route for resending code
                data: {
                    _token: "{{ csrf_token() }}",
                    email: email
                },
                success: function (response) {
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        background: '#1c1c1c',
                        button: "OK"
                    });
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: error.responseJSON.message,
                        background: '#1c1c1c',
                        button: "OK"
                    });
                }
            });
        }

        // Attach an event listener to the "Resend Code" link
        document.getElementById("resendCodeLink").addEventListener("click", function (event) {
            event.preventDefault();
            resendVerificationCode();
        });


    </script>
@endsection
