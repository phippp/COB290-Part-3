@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            background-color: #F4F5F7;
        }
    </style>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <h2> Specialists </h2>
        <br>
        <div class="white-bg-card">
            <div class="search-section">
                <div id="search-by-form">
                    <label for="type">Search By:</label>
                    <select name="type" id="search-type">
                        <option value="id">Specialist ID</option>
                        <option value="name">Name</option>
                        <option value="branch">Branch ID</option>
                        <option value="location">City / Country</option>
                    </select>
                    <input type="text" name="" id="search-input">
                    <button onclick="updateSpecialist()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                </div>
            </div>

            <div id="table-content">
                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <input style="display: none" name="hidden-page" id="hidden-page">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table" id="spec-table">
                        <tr>
                            <th> Specialist ID </th>
                            <th> Name </th>
                            <th> Tasks Assigned </th>
                            <th> Branch ID </th>
                            <th> City / Country </th>
                        </tr>
                        @foreach ($specialists as $specialist)
                        <tr>
                            <td>{{ $specialist->id }}</td>
                            <td>{{ $specialist->forename }} {{ $specialist->surname }}</td>
                            <td>{{ $specialist->count }}</td>
                            <td>{{ $specialist->branch_id }}</td>
                            <td>{{ $specialist->city }}, {{ $specialist->country }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <script src="{{ asset('js/specialist/specialists.js')}}"></script>

    </div>
@endsection
