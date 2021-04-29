@extends('base')

@section('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            background-color: #F4F5F7;
        }
    </style>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('analyst.analyst_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->
        <h2> LogFile </h2> <br>
        <div class="cases-reported-section">
            <br>
            <div class="search-section">
                <div id="search-by-form">
                    <label for="type">Search By:</label>
                    <select name="type" id="search-type">
                        <option value="date">Date</option>
                        <option value="problemID">Problem ID</option>
                        <option value="title">Problem Title</option>
                        <option value="category">Category</option>
                        <option value="status">Status</option>
                        <option value="importance">Importance</option>
                        <option value="assignedTo">Assigned To</option>
                    </select>
                    <input type="text" name="" id="search-input">
                    <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                </div>

                <div id="filter-btn-section">
                    <img src="{{ asset('images/filter.svg') }}" alt="">
                    <p> Filter by  </p>
                    <img src="{{ asset('images/dropdown_arrow.svg') }}" alt="" id="filter-dropdown-arrow">
                </div>
            </div>

            <!--  Aim of the code below is to display all the fields/option, the user can filter through so they can access the report they were looking for easily .-->
            <div>
                <!-- filter-option-display -->
                <div id="display-filter-container">
                    <div id="date-filter-container">
                        <p class="sortby-title"> Date</p>
                        <input type="radio" name="sort-date" value="oldest-newest" id="oldest-newest">  Oldest to newest <br>
                        <input type="radio" name="sort-date" value="newest-oldest" id="newest-oldest">  Newest to oldest  <br>
                        <input type="date" id="date-custom-start" name="start-date" placeholder="Start">
                        To
                        <input type="date" id="date-custom-finish" name="finish-date" placeholder="End">
                    </div>

                    <div id="problem-id-container">
                        <p class="sortby-title">Problem ID</p>
                        <input type="radio" name="problemIDToggle" value="smallest-to-largest" id="smallest-to-largest">  Smallest to largest  <br>
                        <input type="radio" name="problemIDToggle" value="largest-to-smallest" id="largest-to-smallest">  Largest to smallest <br>
                        <input type="text" name="start-id" id="custom-problemID-start" placeholder="Start">
                        To
                        <input type="text" name="finish-id" id="custom-problemID-end" placeholder="End">
                    </div>

                    <div id="other-attribute-container">
                        <div id="organise-other-attribute">
                            <div class="dropdown-attribute">
                                <!-- got this select tag template from w3 school -->
                                <label for="importance" class="sortby-title"> Importance</label> <br>
                                <select name="importance" id="importance">
                                    <option value="">-</option>
                                    <option value="lowHigh">Low to high importance </option>
                                    <option value="highLow">High to low importance </option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>

                            <div class="dropdown-attribute">
                                <!-- got this select tag template from w3 school -->
                                <label for="problemTitle" class="sortby-title">Title</label> <br>
                                <select name="problemTitle" id="problemTitle">
                                    <option value="">-</option>
                                    <option value="A-Z">Sort by A-Z</option>
                                    <option value="Z-A">Sort by Z-A</option>
                                </select>
                            </div>

                            <div class="dropdown-attribute">
                                <!-- got this select tag template from w3 school -->
                                <label for="status" class="sortby-title">Status</label> <br>
                                <select name="status" id="status">
                                    <option value="">-</option>
                                    <option value="In-Queue">InQueue</option>
                                    <option value="Verify">Verify</option>
                                    <option value="Solved">Solved</option>
                                </select>
                            </div>

                        </div> <!-- end of organise-other-attribute | flex component -->
                    </div> <!-- end of other-attribute-container -->

                    <div id="filter-apply-container">
                        <button class="btn-primary" name="applyFilter" onclick="getAjax()"> Apply </button>
                        <button class="btn-primary-inverse" name="resetFilter"> Reset Filter </button>
                    </div>
                    <br><br>
                </div> <!-- end of display-filter section | a grid component -->
            </div>

                <!--
                    ######################################################################################
                    END OF FILTER/ SEARCH SECTION
                    ######################################################################################

                -->
            <br>

            <div id="table-content">
                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <input style="display: none" name="hidden-page" id="hidden-page">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table hover-cursor-on-table">
                        <tr>
                            <th> Date </th>
                            <th> Problem ID </th>
                            <th> Problem Title </th>
                            <th> Category </th>
                            <th> Status</th>
                            <th> Importance </th>
                            <th> Assigned To </th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
    <script src="{{ asset('js/client/register.js')}}"></script>
    <script src="{{ asset('js/client/viewOverview.js')}}"></script>

@endsection