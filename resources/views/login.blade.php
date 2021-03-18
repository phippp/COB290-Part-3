@extends('base')

@section('content')
    {{-- This shows an error message if the login is invalid --}}

    <div class="login-container">
        <div class="item">
            <h2 id="company-title"> Make-It-All </h2>
            @if (session('status'))
                <div class="single-error-container">
                    <span> &#10006 </span>
                    <div id="call-reason-error-msg">
                        <p>{{ session('status') }}</p>
                    </div>
                </div>
            @endif
            <form id="login-form" action="{{ route('login') }}" method="post">
                @csrf
                <label for="username">Username<span class="required-field">*</span></label>
                <input type="text" name="username" id="username" placeholder="Your username" value="{{ old('username') }}" class="inputfield">
                <label for="password">Password<span class="required-field">*</span></label>
                <input type="password" name="password" id="password" placeholder="Choose a password" class="inputfield">

                <button type="submit">Login</button>

            </form>
        </div>
    </div>
@endsection
