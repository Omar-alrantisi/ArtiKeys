@php
    $websiteSetting = \App\Domains\WebsiteSetting\Models\WebsiteSetting::query()->select('logo', 'favicon', 'main_color')->first();
    $sliders = \App\Domains\Slider\Models\Slider::query()->where('status', 1)->get();
@endphp
@include('frontend.includes.header')
@yield('body')
@include('frontend.includes.footer')
@yield('after-scripts')
