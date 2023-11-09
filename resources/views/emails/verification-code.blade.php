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
{{--    <img src="{{ storageBaseLink(\App\Enums\Core\StoragePaths::WEBSITE_SETTING_LOGO . $websiteSetting->logo) }}" alt="ArtiKeys Logo" class="logo">--}}
    <h2>Welcome to Arti Keys!</h2>
    <p>To verify your account, please copy the following code and enter it on the registration page:</p>
    <p>Your verification code is: <strong>{{ $verificationCode }}</strong></p>
    <p>If you did not register with Arti Keys, please ignore this message as it's possible that someone else entered your email address by mistake.</p>
    <p>Good luck and wish you all the best.</p>
    <p>ArtiKeys Team</p>
</div>
</body>
</html>
