@php
    $websiteSetting = \App\Domains\WebsiteSetting\Models\WebsiteSetting::query()->select('logo', 'favicon', 'main_color')->first();
    $sliders = \App\Domains\Slider\Models\Slider::query()->where('status', 1)->get();
@endphp

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{appName()}} | @yield('sub-title',"Register")</title>
    <link rel="stylesheet" href="{{asset("assets/style/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/style/bootstrap-5.0.2-dist/css/bootstrap.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="{{storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_FAVICON.$websiteSetting->favicon)}}"
          rel="icon">

</head>
<body>
<section class="container-fluid background" style="margin-top: 30vh">
    <div class="col-md-12">
        <div class="intro mt-3">
            <h2 class="text-center">Revisit your <span>ArtiKeys</span> account </h2>
        </div>
        <form action="{{ route('frontend.auth.login') }}" method="post" class="rounded p-4">
            @csrf
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    @include('includes.partials.messages')
                    <div class="input-group mb-3">
                            <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Enter your email address">
                                <i class="fas fa-envelope"></i>
                            </span>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                               id="email" aria-describedby="emailHelp" placeholder="Email address" required>
                    </div>
                    <p id="email_message"></p>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="col-md-6 mb-3">
                    <div class="input-group mb-3">
                            <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Enter your password">
                                <i class="fas fa-lock"></i>
                            </span>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required>
                        <div class="input-group-append">
                            <button class="btn  btn-outline-secondary show-password-button" id="togglePassword"
                                    type="button">
                                <i class="fa fa-eye" style="color: #0a53be !important;"></i>
                            </button>
                        </div>
                    </div>
                    <p id="pass_message"></p>
                    <div id="pass_help" class="form-text">Password should be between 6-18 characters.</div>
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3"></div>
                <div class="mb-3 form-check col-md-6">
                    <input name="remember" id="remember" class="form-check-input" type="checkbox"
                        {{ old('remember') ? 'checked' : '' }}/>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
            </div>


            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-3">
                    <button id="signup_btn" type="submit" class="btn btn1 btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </div>
                <div class="col-md-3">
                    <a href="{{ route('frontend.auth.register') }}" class="btn btn1 btn-secondary centered-button">
                        <i class="fas fa-user-plus"></i> Don't Have an Account? Sign Up
                    </a>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <a href="{{ route('frontend.auth.password.request') }}"
                       class="btn btn1 btn-secondary centered-button">
                        <i class="fas fa-passport"></i> Forgot Your Password?
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="/" class="btn btn1 btn-secondary centered-button">
                        <i class="fas fa-home"></i> Return Home
                    </a>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </form>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!-- Include Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>

<!-- Include Bootstrap's JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Add Bootstrap tooltips script for hint on hover -->
<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
    document.addEventListener("DOMContentLoaded", function() {
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");

        togglePasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordButton.innerHTML = '<i style="font-size: 1.5rem;font-weight: 700;color: #0a53be !important;" class="fa fa-eye-slash" aria-hidden="true"></i>';
            } else {
                passwordInput.type = "password";
                togglePasswordButton.innerHTML = '<i style="font-size: 1.5rem;font-weight: 700;color: #0a53be !important;" class="fa fa-eye"></i>';
            }
        });

        const loginForm = document.getElementById("loginForm");
        // Calculate the offset of the form from the top of the page
        const offsetTop = loginForm.getBoundingClientRect().top;
        // Smoothly scroll to the login form's position
        window.scrollTo({
            top: offsetTop,
            behavior: "smooth"
        });
    });
</script>
</body>
