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
<section class="container-fluid  mb-5 background" style="margin-top: 100px">
    <div class="col-md-12">
        <div class="intro mt-3">
            <h2 class="text-center">Complete the registration for <span>ArtiKeys</span></h2>
        </div>
        <form action="{{ route('frontend.frontSubscription.user.store') }}" method="post" class="rounded p-4 ">
            @csrf
            <div class="mb-3">
                @include('includes.partials.messages')

                <div class="row">
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Enter your email address">
                                <i class="fas fa-envelope "></i>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email"
                                   aria-describedby="emailHelp" placeholder="Email address" required>
                        </div>
                        <p id="email_message"></p>
                        <div id="emailHelp" class="form-text">e.g., username@domain.com</div>
                    </div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                            <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top"
                                  title="Enter your mobile number">
                                <i class="fas fa-mobile-alt "></i>
                            </span>
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}" maxlength="10"
                                   class="form-control" id="phone_number" placeholder="Mobile" required>
                        </div>
                        <p id="message_mobile"></p>
                        <div id="mobileHelp" class="form-text">e.g., 077********</div>
                    </div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3">
                        <div class="input-group">
                    <span class="input-group-text" data-bs-toggle="tooltip" data-bs-placement="top"
                          title="Enter your password">
                        <i class="fas fa-lock"></i>
                    </span>
                            <input type="password" name="password" id="password" class="form-control"
                                   aria-label="password"
                                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,18}$"
                                   title="Password must be 6 to 18 characters long and include at least one lowercase letter, one uppercase letter, one digit, and one special character (@, $, !, %, *, ?, &)."
                                   placeholder="Password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary show-password-button" id="togglePassword"
                                        type="button"><i class="fas fa-eye" style="color: #0a53be !important;"></i>
                                </button>
                            </div>
                        </div>
                        <p id="pass_message"></p>
                        <div id="pass_help" class="form-text">Password should be between 6-18 characters.</div>
                    </div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3 form-check">
                        <input type="checkbox" id="check_terms" required>
                        <label class="form-check-label" for="check_terms">I agree to the <a
                                href="{{ route('frontend.pages.terms') }}">terms & conditions</a> of ArtiKeys.</label>
                        <p id="check_terms_message"></p>
                    </div>
                    <div class="col-md-4 mb-3"></div>
                    <div class="col-md-4 mb-3"></div>

                    <div class="row">
                        <div class="col-md-4 mb-3"></div>
                        <div class="col-md-4">
                            <button id="signup_btn" type="submit" class="btn btn1 btn-primary">
                                <i class="fas fa-user-plus"></i> Sign Up
                            </button>
                        </div>
                        <div class="col-md-4 mb-3"></div>
                        <div class="col-md-4 mb-3"></div>
                        <div class="col-md-3">
                            <a href="{{ route('frontend.auth.login') }}">
                                <i class="fas fa-sign-in-alt"></i> Already Have an Account? Login
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </form>

        <!-- Add Bootstrap tooltips script for hint on hover -->
        <script>
            $(function () {
                $('[data-bs-toggle="tooltip"]').tooltip();
            });
        </script>
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
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const togglePasswordButton = document.getElementById("togglePassword");

        togglePasswordButton.addEventListener("click", function () {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordButton.innerHTML = '<i style="font-size: 1.5rem;font-weight: 700; color: #0a53be !important;" class="fa fa-eye-slash" aria-hidden="true"></i>';
            } else {
                passwordInput.type = "password";
                togglePasswordButton.innerHTML = '<i style="font-size: 1.5rem;font-weight: 700;color: #0a53be !important;" class="fa fa-eye"></i>';
            }
        });
    });
</script>
</body>
</html>
