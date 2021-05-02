@extends('base')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection


@section('content')
    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container flex">
        @include('specialist.profile.specialist_profile_nav_template')

        <div class="content-container">
            <h3 class="section-heading">Preferred Language</h3>
            <hr>
            <form action="#" method="post">
                @csrf
                <select name="language" id="" class="select-default">
                    <option value="Arabic"> Arabic </option>
                    <option value="English"> English </option>
                    <option value="German"> German </option>
                    <option value="Japanese"> Japanese </option>
                </select>
                <button type="submit" class="btn-primary"> Change </button>
            </form>

        </div>

    </div>

@endsection
