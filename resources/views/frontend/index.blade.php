@extends('frontend.includes.main')
@section('body')
    @section('home')
        active
    @endsection
    <div class="container-fluid  mb-5">
{{--        <div class="row">--}}
{{--            <div class="col-md-6 mt-5">--}}
{{--                <a href="{{route('frontend.auth.login')}}" class="text-decoration-none">--}}
{{--                    <div class="card custom-box">--}}
{{--                        <div class="card-body">--}}
{{--                            <i class="fas fa-sign-in-alt custom-icon"></i>--}}
{{--                            <h5 class="card-title">Log In</h5>--}}
{{--                            <p class="card-description">Welcome back, creative soul! 🎨 Access your Artikeys account and dive into a world of inspiration and learning. Whether you're picking up where you left off or exploring new horizons, your artistic adventure awaits. Log in now to continue your creative odyssey</p>--}}
{{--                            <p class="card-text">Click here to log in.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6 mt-5">--}}
{{--                <a href="{{route('frontend.auth.register')}}" class="text-decoration-none">--}}
{{--                    <div class="card custom-box">--}}
{{--                        <div class="card-body">--}}
{{--                            <i class="fas fa-user-plus custom-icon"></i>--}}
{{--                            <h5 class="card-title">Register</h5>--}}
{{--                            <p class="card-description">Unlock the world of limitless possibilities with a single click! 🚀 Join the Artikeys community today and embark on a journey of creativity and knowledge. It's time to turn your dreams into reality. Register now and let your artistic passions flourish!</p>--}}
{{--                            <p class="card-text">Click here to create an account.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}



    <div class="team-boxed">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Welcome to <span>ArtiKeys</span>  </h2>
                <p class="text-center">Choose an option below to get started:</p>
            </div>
            <div class="row people">
                <div class="col-md-6 col-lg-6 item">
                    <div class="box">
                        <a href="{{route('frontend.auth.login')}}" class="text-decoration-none">

                        <i class="fas fa-sign-in-alt custom-icon"></i>
                        <h3 class="name">Log In</h3>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6 item">
                    <div class="box">
                        <a href="{{route('frontend.auth.register')}}" class="text-decoration-none">

                        <i class="fas fa-user-plus custom-icon"></i>
                        <h3 class="name">Register</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
