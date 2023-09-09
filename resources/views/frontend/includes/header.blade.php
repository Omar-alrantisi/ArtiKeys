@php
    $websiteSetting = \App\Domains\WebsiteSetting\Models\WebsiteSetting::query()->select('logo', 'favicon', 'main_color')->first();
    $sliders = \App\Domains\Slider\Models\Slider::query()->where('status', 1)->get();
    $showSlider = true; // Set this to false on pages where you want to hide the slider
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_FAVICON.$websiteSetting->favicon)}}" rel="icon">

</head>
<body>
<div class="">
    <div class="row">
        @if ($showSlider)
        <div class="col-lg-4 col-sm-12 slider h-100 @yield('show')">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $index=> $slider)

                    <div class="carousel-item @if($index==1) active @endif">
                        <img src= "{{storageBaseLink(\App\Enums\Core\StoragePaths::SLIDER_IMAGE.$slider->image)}}" style="height: 100vh !important;" class="d-block w-100 h-100" alt="...">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        <div class="col-lg-8 col-sm-12">

            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">
                        <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_LOGO . $websiteSetting->logo) }}" alt="{{ appName() }} Logo" width="260" height="70" class="d-inline-block align-text-top">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('frontend.pages.help') }}">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.pages.terms') }}">Terms & Conditions</a>
                            </li>
                            @if ($logged_in_user)
                                <x-utils.link
                                    :text="__('Logout')"
                                    class="nav-link text-dark"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <x-slot name="text">
                                        @lang('Logout')
                                        <x-forms.post :action="route('frontend.auth.logout')" id="logout-form" class="d-none" />
                                    </x-slot>
                                </x-utils.link>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>


            <hr>
