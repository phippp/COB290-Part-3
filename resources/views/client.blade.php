@extends('base')

@section('content')
    <!-- Navigation  -->
    <div class="nav-container"> <!-- this class applies background styling to our navigation-->

        <nav> <!-- This is a flex container and it will centers all the content that we will be showing-->

            <div class="logo">
                <h1 id="logo-name"> Make-It-All </h1>
                <!-- The div below will store icon/images which will be displayed if the user screen is small -->
                <div id="nav-state-icon">
                    <!-- FUTURE NOTE: may want to replace the character code into image -->
                    <span id="close-nav" class="container-hide">&#10005;</span>
                    <span id="open-nav">&#8801;</span>
                </div>
            </div>

            <!-- All the main navigation links goes here -->
            <div id="primary-nav-links">
                <a href="#" class="nav-link-active"> Dashboard </a>
                <a href="#"> Register </a>
            </div>

            <!-- All the secondary navigation link goes here -->
            <div id="secondary-nav-links">
                <a href="#" id="current-emp-name"> Forename surname </a>
                <!-- The div contains all the navigation link we want to show when the user hovers over nav section-->
                <div class="drop-down-nav">
                    <a href="#"> Language </a>
                    <a href="#"> Logout </a>
                </div>
            </div>

        </nav>
    </div>
    <!-- end of navigation -->


    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <!--
            ######################################################################################
            STATS SECTION - aim is to provide a status on the reports which are currently ongoing
            ######################################################################################
         -->

        <!-- Showing the numeric stat's data in card format -->
        <div class="stats-card-section">
            <h2> Your Summary </h2>

            <div class="stats-card-container">
                <div class="stats-card">
                    <h4> Cases reported today. </h4>
                    <h3>  15 </h3>   <!-- making the numeric data look bigger than their description to give them more importance -->
                </div>
                <div class="stats-card">
                    <h4> Total ongoing cases . </h3>
                    <h3>  15 </h3>
                </div>
                <div class="stats-card">
                    <h4> Cases on verify </h4>
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


        <!-- This section will be concerned with displaying all the cases the client has issued   -->
        <div class="cases-reported-section">
            <h3 class="section-title"> Cases Issued  </h3>

            <!--
                ######################################################################################
                Filter section
                Giving them the option to filter  or search through cases (which the client have reported)
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
                    <button type="submit"> <img src="search icon.svg" alt="Search" srcset=""> </button>
                </form>

                <!-- Filter btn (Nitesh: i  had to place it here due to the styling of the page )
                    The section below is simple filter btn in which they client click on to see all the filter they can sort through
                -->
                <div id="filter-btn-section">
                    <img src="filter.svg" alt="">
                    <p> Filter by  </p>
                    <img src="dropdown_arrow.svg" alt="" id="filter-dropdown-arrow">
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
                        <th style="width:30%"> Title</th>
                        <th> Category </th>
                        <th> Status </th>
                        <th> Importance </th>
                        <th> Assign To </th>
                    </tr>

                    <tr>
                        <td> Lorem ipsum dolor sit amet.</td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                    </tr>
                    <tr>
                        <td> Lorem ipsum dolor sit amet.</td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                        <td> Lorem ipsum dolor sit amet. </td>
                    </tr>
                </table>

            </div>


            <!-- This section will handle pagination and the number of rows to show in a table -->
            <div class="table-property-container">
                <div class="pagination">
                    <a href=""> &#x276E </a>
                    <input type="number" id="page-number" value="" min="1" max="1" onchange="validatePagination()">
                    <span> / 2 </span>
                    <a href=""> &#x276F </a>
                </div>


                <div class="row-property">
                    <label for="row-limit">Rows per page:</label>
                    <select name="row-limit" id="row-limit">
                        <option value="25">  25</option>
                        <option value="50">  50</option>
                        <option value="100">100</option>
                        <option value="200"> 200</option>
                    </select>
                </div>
            </div>

            <!--
                ######################################################################################
                END OF RECORDS/ TABLE SECTION
                ######################################################################################
            -->
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('js/client.js') }}"></script>
@endsection
