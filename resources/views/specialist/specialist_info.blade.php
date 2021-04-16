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

        <div class="search-section">
            <div id="search-by-form">
                <label for="type">Search By:</label>
                <select name="type" id="search-type">
                    <option value="problemID">Specialist ID</option>
                    <option value="date">Name</option>
                    <option value="title">Task Assigned</option>
                    <option value="category">Branch</option>
                    <option value="category">City / Country</option>
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
                        <th> Sepcialist ID </th>
                        <th> Name </th>
                        <th> Task Assigned</th>
                        <th> Branch </th>
                        <th> City / Country </th>
                    </tr>
                    <tr>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                        <td>  </td>
                    </tr>
                </table>
            </div>

            <div class="table-property-container">
                <div class="pagination">
                    <a href=""> &#x276E </a>
                    <span id="page-number"></span>
                    <a href=""> &#x276F </a>
                </div>
            </div>
        </div>
    </div>
@endsection