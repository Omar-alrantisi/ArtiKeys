@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
{{--  start index section  --}}
    <section class="container index">
    <form  action="{{route('frontend.frontSubscription.user.store')}}" method="post" >
        @csrf
        <div class="mb-3">
            @include('includes.partials.messages')
            <h1 class="font-weight-bold">Create an account</h1>
            <label for="email" class="form-label font-weight-bold">Email address <span>*</span></label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="email" aria-describedby="emailHelp" required>
            <p id="email_message"></p>
            <div id="emailHelp" class="form-text ">eg: username@domain.com</div>
        </div>
        <div class="mb-3">
            <label for="phone_number" class="form-label">Mobile <span>*</span></label>
            <input type="text" name="phone_number" {{old('phone_number')}} maxlength="10" class="form-control" id="phone_number" required>
            <p id="message_mobile"></p>
            <div id="mobileHelp" class="form-text">eg: 077********</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <span>*</span></label>
            <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control" aria-label="password"
                       pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,18}$"
                       title="Password must be 6 to 18 characters long and include at least one lowercase letter, one uppercase letter, one digit, and one special character (@, $, !, %, *, ?, &).">
{{--                <button type="button" class="bg-primary text-white" onclick="generatePassword()">Generate Password</button>--}}


                <div class="input-group-append">
                    <button class="btn  btn-outline-secondary show-password-button" id="togglePassword" type="button"><i  class="fa fa-eye"></i></button>
                </div>
            </div>

            <p id="pass_message"></p>
            <div id="pass_help" class="form-text">Create a password that's 8 characters or longer, with at least one lowercase letter, one uppercase letter, one digit, and one special character @$!%*?& to boost its security.</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox"  id="check_terms" required>
            <label class="form-check-label" for="exampleCheck1">I agree to the <a href="{{route('frontend.pages.terms')}}"> terms & conditions </a> ArtiKeys.</label>
            <p id="check_terms_message"></p>
        </div>
        <button id="signup_btn" type="submit" class="btn btn1 btn-primary">SignUp</button>
        <br>
        <a href="{{route('frontend.auth.login')}}" class="btn btn1 btn-primary centered-button">Already Have an Account?Login</a>

    </form>
    </section>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");

        togglePasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordButton.innerHTML = '<i style="font-size: 1.5rem;font-weight: 700" class="fa fa-eye-slash" aria-hidden="true"></i>';
            } else {
                passwordInput.type = "password";
                togglePasswordButton.innerHTML = '<i style="font-size: 1.5rem;font-weight: 700" class="fa fa-eye"></i>';
            }
        });
    });

    function generatePassword() {
        const lowercase = "abcdefghijklmnopqrstuvwxyz";
        const uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const digits = "0123456789";
        const specialChars = "@$!%*?&";
        const allChars = lowercase + uppercase + digits + specialChars;
        const passwordLength = Math.floor(Math.random() * (18 - 6 + 1)) + 6;

        let generatedPassword = '';
        generatedPassword += lowercase[Math.floor(Math.random() * lowercase.length)];
        generatedPassword += uppercase[Math.floor(Math.random() * uppercase.length)];
        generatedPassword += digits[Math.floor(Math.random() * digits.length)];
        generatedPassword += specialChars[Math.floor(Math.random() * specialChars.length)];

        for (let i = 4; i < passwordLength; i++) {
            generatedPassword += allChars[Math.floor(Math.random() * allChars.length)];
        }

        document.getElementById("password").value = generatedPassword;
    }
</script>
