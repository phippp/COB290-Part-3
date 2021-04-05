@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
        body{
            background-color: #F4F5F7;
        }
    </style>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->
        
        <div class="stats-card-section">
            <h2> Your Summary </h2>

            <div class="stats-card-container"> 
                <div class="stats-card"> 
                    <h4> Cases assigned today. </h4>
                    <h3>  15 </h3>   <!-- making the numeric data look bigger than their description to give them more importance -->
                </div>
                <div class="stats-card">
                    <h4> Cases Solved by You </h3>
                    <h3>  15 </h3>
                </div>
                <div class="stats-card">
                    <h4> Cases Left to Resolve </h4>
                    <h3>  15 </h3>
                </div>

                <div class="stats-card">
                    <!-- this section will show all importance level assigned to the cases that client has reported (which are ongoing) -->
                    <h4> Importance  Level </h4>
                    <div class="importance-info-container">
                        <div class="importance-item" id="low-importance">
                            <h5> Low </h5>
                            <h4> 5 </h4>
                        </div>

                        <div class="importance-item" id="medium-importance">
                            <h5> Medium </h5>
                            <h4> 5 </h4>
                        </div>

                        <div class="importance-item" id="high-importance">
                            <h5> High </h5>
                            <h4> 5 </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of displaying stats data -->
        <!-- 
            ######################################################################################
            END OF STATS SECTION 
            ######################################################################################
         -->



        <!-- This section will be concerned with displaying all the cases the specialist is allocated   -->
        <div class="cases-reported-section">
            <h1 class="section-title"> Cases </h1>

            <!--
                ######################################################################################
                Filter section
                Giving them the option to filter  or search through cases (which the specialist is assigned)
                ######################################################################################
            -->

            <!-- Search section, responsible for displaying all the option the user can search by to quickly identify a case which they have reported -->
            <div class="search-section">
                <form action="#" method="post" id="search-by-form">
                    <label for="type">Search By:</label>
                    <select name="type" id="search-type">
                      <option value="problemID">Problem ID</option>
                      <option value="date">Date</option>
                      <option value="title">Problem Title</option>
                      <option value="category">Category</option>
                      <option value="status">Status</option>
                      <option value="importance">Importance</option>
                      <option value="assigned">Assigned To</option>
                    </select>
                    <input type="text" name="" id="search-input">
                    <button type="submit"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                </form>

                <!-- Filter btn (:Was place here here due to the styling of the page )
                    The section below is simple filter btn in which they client click on to see all the filter they can sort through
                -->
                <div id="filter-btn-section">
                    <img src="{{ asset('images/filter.svg') }}" alt="">
                    <p> Filter by  </p>
                    <img src="{{ asset('images/dropdown_arrow.svg') }}" alt="" id="filter-dropdown-arrow">
                </div>
            </div>


            <!--  Aim of the code below is to display all the fields/option, the user can filter through so they can access the report they were looking for easily .-->
            <form action="#" method="get">
                <!-- filter-option-display -->
                <div id="display-filter-container">
                    <div id="date-filter-container">
                        <p class="sortby-title"> Date</p>
                        <input type="radio" name="sort-date" value="oldest-newest" id="oldest-newest">  Oldest to newest <br>
                        <input type="radio" name="sort-date" value="newest-oldest" id="newest-oldest">  Newest to oldest  <br>
                        <input type="radio" name="sort-date" value="custom-date" id="date-custom">
                        <input type="date" id="date-custom-start" name="start-date" placeholder="Start">
                        To
                        <input type="date" id="date-custom-finish" name="finish-date" placeholder="End">
                    </div>

                    <div id="problem-id-container">
                        <p class="sortby-title">Problem ID</p>
                        <input type="radio" name="problemIDToggle" value="smallest-to-largest" id="smallest-to-largest">  Smallest to largest  <br>
                        <input type="radio" name="problemIDToggle" value="largest-to-smallest" id="largest-to-smallest">  Largest to smallest <br>
                        <input type="radio" name="problemIDToggle" value="custom-problem-ID" id="custom-problem-ID">
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
                                    <option value="blank">-</option>
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
                                    <option value="blank">-</option>
                                    <option value="A-Z">Sort by A-Z</option>
                                    <option value="Z-A">Sort by Z-A</option>
                                </select>
                            </div>

                            <div class="dropdown-attribute">
                                <!-- got this select tag template from w3 school -->
                                <label for="status" class="sortby-title">Status</label> <br>
                                <select name="status" id="status">
                                    <option value="blank">-</option>
                                    <option value="In-Queue">InQueue</option>
                                    <option value="Verify">Verify</option>
                                    <option value="Solved">Solved</option>
                                </select>
                            </div>

                        </div> <!-- end of organise-other-attribute | flex component -->
                    </div> <!-- end of other-attribute-container -->

                    <div id="filter-apply-container">
                        <button id="apply-filter-button" name="applyFilter"> Apply </button>
                        <button id="reset-filter-button" name="resetFilter"> Reset Filter </button>
                    </div>
                    <br><br>
                </div> <!-- end of display-filter section | a grid component -->
            </form>

            <!--
                ######################################################################################
                END OF FILTER/ SEARCH SECTION
                ######################################################################################

            -->




            <!--
                ######################################################################################
                RECORDS - Displaying all the records that was issued by them in a table format
                ######################################################################################
            -->

            <!-- Displaying all the records they have registered in the system -->
            <div class="scrolltable-x">
                <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                    scroll feature so they view all the fields in the table  -->

                <table class="normal-table hover-cursor-on-table">
                    <tr>
                        <th> Date </th>
                        <th> Problem ID </th>
                        <th style="width:30%"> Problem Title</th>
                        <th> Category </th>
                        <th> Status </th>
                        <th> Importance </th>
                        <th> Assigned To </th>
                    </tr>
                </table>
            </div>

            <div class="table-property-container">
                <div class="pagination">
                    <!--To fill pagination stuff -->
                </div>
            </div>

            <script type="text/javascript" src="{{ asset('js/client/dashboard.js') }}"></script>
            <!--
                ######################################################################################
                END OF RECORDS/ TABLE SECTION
                ######################################################################################
            -->
        </div>
    </div>


@endsection
