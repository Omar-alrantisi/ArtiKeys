@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <h4 class="text-center mt-5">Welcome! {{$users->email}} </h4>
    <form action="{{ route('frontend.frontSubscription.emailVerification.verify') }}" method="post" class="email-verification-form mt-5">
        @csrf
        @include('includes.partials.messages')
        <div class="mb-3">
            <!-- Display user's email -->
            <p class="email-verification-p">
                A verification code has been sent via email to: {{ auth()->user()->email }}
            </p>
            <p class="email-verification-p-2">
                Enter verification code (from 4 digits)<span>*</span>
            </p>
            <input class="verification-number" type="number" name="verification_code" min="1000" max="9999" step="1" placeholder="1234" required>
            <!-- Add a hidden input for user's email -->
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            <p class="email-verification-p-3">
                Didn't get the verification code,
                <a href="#" id="resendCodeLink">Resend Code</a>
            </p>            <p style="color: #002FC2;">
                If you can't find your conformation/reset password email in your
                normal inbox, it is worth checking in your spam or junk mail section.
            </p>
            <button id="verify_btn" type="submit" class="btn btn1 btn-primary">Verify</button>
        </div>
    </form>

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
