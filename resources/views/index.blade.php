@extends('app')

@section('content')
    <h1>This is the index page</h1>
    @auth
        <p>You are logged in as: {{ auth()->user()->username }} </p>
        <p>Your job title is: {{auth()->user()->employee->job->title}} </p>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button>Logout</button>
        </form>
    @endauth
    @guest
        <a href="{{ route('login')}}">Login</a>
    @endguest
@endsection
