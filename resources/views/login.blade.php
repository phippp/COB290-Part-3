@extends('app')

@section('content')
    Login
    @if (session('status'))
        <div style="color: red;">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Your username" value="{{ old('username') }}">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Choose a password" >
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
@endsection
