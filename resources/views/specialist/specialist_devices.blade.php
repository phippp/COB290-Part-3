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

        <div class="heading-flex-end">
                <h2 class="page-title"> Device View </h2>
        </div>
        <hr class="page-title-hr">

        <!-- ########################################################################### -->
        <!-- Option: View hardware or software -->
        <div class="toggle-button-container">
                <input type="button" id="toggle-hardware" class="toggle-button toggle-selected" value="Hardware" onclick="displayAppropriateDevice('Hardware')">
                <input type="hidden" id="option-selected" name="option_selected" value="Solution"> <!-- this tag is there to help the backend team determine which section to validate-->
                <input type="button" id="toggle-software" class="toggle-button" value="Software" onclick="displayAppropriateDevice('Software')">
            </div>
        <br>

        <!-- ########################################################################### -->
        <!-- Option: View hardware -->
        <div id="hardware-section">
            <div class="search-section">
                <div id="search-by-form">
                    <label for="type">Search By:</label>
                    <select name="type" id="search-type">
                        <option value="problemID">Serial Number</option>
                        <option value="date">Make</option>
                        <option value="title">Type</option>
                        <option value="category">Name</option>
                    </select>
                    <input type="text" name="" id="search-input">
                    <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                </div>
            </div>
            <div id="table-content">
                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <input style="display: none" name="hidden-page" id="hidden-page">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table hover-cursor-on-table">
                        <tr>
                            <th> Serial Number </th>
                            <th> Make </th>
                            <th> Type</th>
                            <th> Name </th>
                        </tr>
                        @foreach ($hardware as $hw)
                        <tr>
                            <td>{{ $hw->serial_num}}</td>
                            <td>{{ $hw->make }}</td>
                            <td>{{ $hw->type }}</td>
                            <td>{{ $hw->name }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <!-- ########################################################################### -->
        <!-- Option: View software -->
        <div id="software-section" class="container-hide">
        <div class="search-section">
            <div id="search-by-form">
                <label for="type">Search By:</label>
                <select name="type" id="search-type">
                    <option value="softwareID">Software ID</option>
                    <option value="name">Name</option>
                    <option value="version">Version</option>
                </select>
                <input type="text" name="" id="search-input">
                <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
            </div>
            </div>
            <div id="table-content">
                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <input style="display: none" name="hidden-page" id="hidden-page">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table hover-cursor-on-table">
                        <tr>
                            <th> Software ID </th>
                            <th> Name </th>
                            <th> Version </th>
                        </tr>
                        @foreach ($software as $sw)
                        <tr>
                            <td>{{ $sw->id }}</td>
                            <td>{{ $sw->name }}</td>
                            <td>{{ $sw->version }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/client/register.js')}}"></script>
    <script src="{{ asset('js/client/viewOverview.js')}}"></script>
@endsection