@extends('base')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection


@section('content')
    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container sidebar-page-container">
        @include('specialist.profile.specialist_profile_nav_template')

        <div class="content-container">
            <h3 class="section-heading">Preferred Language</h3>
            <hr>
            <form action="">
                <select name="language" id="" class="select-default">
                    <option value="arabic"> Arabic </option>
                    <option value="english"> English </option>
                    <option value="german"> German </option>
                    <option value="japanese"> Japanese </option>
                </select>
                <button type="submit" class="btn-primary"> Change </button>
            </form>

        </div>

    </div>

@endsection