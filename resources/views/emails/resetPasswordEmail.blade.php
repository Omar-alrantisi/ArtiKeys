@php
    $websiteSetting = \App\Domains\WebsiteSetting\Models\WebsiteSetting::query()->select('logo', 'favicon', 'main_color')->first();
@endphp

    <!DOCTYPE html>
<html>
<head>
    <style>
        /* Add your email styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #002FC2;
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 10px;
        }

        strong {
            color: #002FC2;
            font-weight: bold;
        }

        .email-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 150px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="email-container">
    {{-- Uncomment the line below when the storageBaseLink function is available --}}
    {{-- <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_LOGO . $websiteSetting->logo) }}" alt="ArtiKeys Logo" class="logo"> --}}
    <h2>Welcome to Arti Keys!</h2>
    <p>{{ $subText }}</p>
    <p>{{ $subText2 }}</p>
    <p>{{ $subText3 }}</p>
    <a href="{{ $href }}" style="display: inline-block; padding: 10px 20px; background-color: #002FC2; color: #fff; text-decoration: none; border-radius: 5px;">
        {{ __('Reset Password') }}
    </a>
    <p>ArtiKeys Team</p>
</div>
</body>
</html>
