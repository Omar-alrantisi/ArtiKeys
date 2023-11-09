
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_FAVICON.$websiteSetting->favicon)}}" rel="icon">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_LOGO . $websiteSetting->logo) }}" alt="{{ appName() }} Logo" width="150" height="" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{ route('frontend.pages.help') }}">
                        <i class="fas fa-question-circle mx-1 text-primary-cus"></i>Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.pages.terms') }}">
                        <i class="fas fa-file-alt mx-1 text-primary-cus"></i>
                        Terms of Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://artikeys.com/">
                        <i class="fas fa-globe mx-1 text-primary-cus"></i>
                        ArtiKeys</a>
                </li>
                @if ($logged_in_user)
                    <x-utils.link
                        :text="__('Logout')"
                        class="nav-link text-dark"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <x-slot name="text">
                            <i class="fas fa-sign-out-alt text-primary-cus"></i>  @lang('Logout')
                            <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
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
            <li data-bs-target="#carouselExampleSlidesOnly" data-bs-slide-to="{{ $index }}" @if($index == 0) class="active" @endif></li>
        @endforeach
    </ol>

    <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
            <div class="carousel-item @if($index == 0) active @endif">
                <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::SLIDER_IMAGE.$slider->image) }}" class="d-block w-100 h-100" alt="Slider Image {{ $index + 1 }}">
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


