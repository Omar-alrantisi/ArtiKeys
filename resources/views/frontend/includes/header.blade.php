<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{appName()}}" />
    <meta property="og:description" content="Register students for the ArtiKeys Bootcamp, an educational program designed to develop development proficiency and creativity through innovative teaching methods and interactive learning experiences. Join us to unlock your development potential!">
    <meta property="og:image" content="https://media.licdn.com/dms/image/C4D0BAQGHxM1jibJa3g/company-logo_200_200/0/1679333360797/artikeys_logo?e=2147483647&v=beta&t=MudhL-ENQuSLUXDWWK92N88UTVSLnifLtIdRCSzBAqY" />
    <meta property="og:url" content="https://sr.artikeys.com" />
    <meta property="og:type" content="website" />

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{appName()}}">
    <meta name="twitter:description" content="Register students for the ArtiKeys Bootcamp, an educational program designed to develop development proficiency and creativity through innovative teaching methods and interactive learning experiences. Join us to unlock your development potential!">
    <meta name="twitter:image" content="https://media.licdn.com/dms/image/C4D0BAQGHxM1jibJa3g/company-logo_200_200/0/1679333360797/artikeys_logo?e=2147483647&v=beta&t=MudhL-ENQuSLUXDWWK92N88UTVSLnifLtIdRCSzBAqY">

    <title>{{appName()}} | @yield('sub-title',"Register")</title>
    <link rel="stylesheet" href="{{asset("assets/style/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/style/bootstrap-5.0.2-dist/css/bootstrap.css")}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="{{storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_FAVICON.$websiteSetting->favicon)}}"
          rel="icon">

    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 7%;
            z-index: 1000; /* Ensure navbar is on top of other content */
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
        }

        .navbar-nav .nav-link {
            color: white !important; /* Set text color to white */
        }

        .navbar-brand img {
            filter: brightness(0) invert(1); /* Invert the logo image colors to make it white */
        }

        /* Mobile menu styles */
        .mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
            z-index: 1000;
            display: none; /* Initially hidden */
        }

        /* Close button styles */
        .close-menu-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 1000px) {
            .navbar {
                background-color: rgba(0, 0, 0, 0) /* Darker background color */
            }
            .show {
                background-color: rgba(0, 0, 0, 0) /* Darker background color */
            }

            .navbar-nav .nav-link {
                color: white !important; /* Text color set to white */
            }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_LOGO . $websiteSetting->logo) }}"
                 alt="{{ appName() }} Logo" width="150" height="" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler toggler-example" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span>
        </button>
        <button class="close-menu-btn" type="button">
            <span>&times;</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('frontend.pages.help') }}">
                        <i class="fas fa-question-circle mx-1 " style="color: white;"></i>Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.pages.terms') }}">
                        <i class="fas fa-file-alt mx-1" style="color: white;"></i>
                        Terms of Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://artikeys.com/">
                        <i class="fas fa-globe mx-1 " style="color: white;"></i>
                        ArtiKeys</a>
                </li>
                @if (!$logged_in_user)
                    <a href="{{route('frontend.auth.login')}}" class="nav-link text-dark">
                        <i class="fas fa-sign-in-alt" style="color: white;"></i> @lang('Login')
                    </a>
                    <a href="{{route('frontend.auth.register')}}" class="nav-link text-dark">
                        <i class="fas fa-user-plus" style="color: white;"></i> @lang('Register')
                    </a>
                @endif
                @if ($logged_in_user&&$logged_in_user->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">
                        <i class="fas fa-dashboard" style="color: white;"></i> @lang('Dashboard')
                    </a>
                @endif
                @if ($logged_in_user&&$logged_in_user->isUser())
                    <a href="{{ route('frontend.frontSubscription.confirmation.index') }}" class="nav-link text-dark">
                        <i class="fas fa-dashboard" style="color: white;"></i> @lang('Profile')
                    </a>
                @endif

                @if ($logged_in_user)
                    <x-utils.link
                        :text="__('Logout')"
                        class="nav-link text-dark"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            <i class="fas fa-sign-out-alt text-primary-cus"></i> @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none"/>
                        </x-slot>
                    </x-utils.link>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <!-- Indicators (optional) -->
    <ol class="carousel-indicators">
        @foreach($sliders as $index => $slider)
            <li data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="{{ $index }}"
                @if($index == 0) class="active" @endif></li>
        @endforeach
    </ol>

    <div class="carousel-inner" style="height: 90vh">
        @foreach($sliders as $index => $slider)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::SLIDER_IMAGE.$slider->image) }}"
                     class="d-block w-100"  style="height: 90vh"alt="Slider Image {{ $index + 1 }}">
                <!-- Optional Caption -->
                <div class="carousel-caption d-none d-md-block">
                    {{--                    <h5>Caption Title</h5>--}}
                    {{--                    <p>Description or additional information</p>--}}
                </div>
            </div>
        @endforeach
    </div>

    <!-- Navigation Controls (optional) -->
    <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </a>
</div>

<script>
    // Close the mobile menu when the close button is clicked
    document.querySelector('.close-menu-btn').addEventListener('click', function() {
        document.querySelector('.mobile-menu').style.display = 'none';
    });
</script>
</body>
</html>
