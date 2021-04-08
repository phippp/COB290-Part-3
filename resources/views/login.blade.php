<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Make It All</title>
    <link rel="stylesheet" href="{{ asset('css/login_style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css')}}">
</head>

<body>
    <div class="login-container">
        <div class="item">
            <h2 id="company-title"> Make-It-All </h2>
            @if (session('status'))
                <div class="single-error-container">
                    <span> &#10006 </span>
                    <div id="call-reason-error-msg">
                        <b>{{ session('status') }}</b>
                    </div>
                </div>
            @endif
            <form id="login-form" action="{{ route('login') }}" method="post">
                @csrf
                <label for="username">Username<span class="required-field">*</span></label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" class="inputfield">
                <label for="password">Password<span class="required-field">*</span></label>
                <input type="password" name="password" id="password" class="inputfield">

                <button type="submit">Login</button>

            </form>
        </div>
    </div>
</body>