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
        <h2> Logfile </h2> <br>
        <div class="white-bg-card">
            <br>
            <div class="search-section">
                <div id="search-by-form">
                    <label for="type">Search By:</label>
                    <select name="type" id="search-type">
                        <option value="id">Problem ID</option>
                        <option value="created_at">Date</option>
                        <option value="title">Problem Title</option>
                        <option value="problem_id">Category</option>
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
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>

                            <div class="dropdown-attribute">
                                <!-- got this select tag template from w3 school -->
                                <label for="status" class="sortby-title">Status</label> <br>
                                <select name="status" id="status">
                                    <option value="">-</option>
                                    <option value="In queue">InQueue</option>
                                    <option value="Verify">Verify</option>
                                    <option value="Solved">Solved</option>
                                </select>
                            </div>

                        </div> <!-- end of organise-other-attribute | flex component -->
                    </div> <!-- end of other-attribute-container -->

                    <div id="filter-apply-container">
                        <button class="btn-primary" name="applyFilter" onclick="getAjax()"> Apply </button>
                        <button class="btn-primary-inverse" name="resetFilter" onclick="clearForm()"> Reset Filter </button>
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

                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/client/register.js')}}"></script>
    <script src="{{ asset('js/client/dashboard.js')}}"></script>
    <script src="{{ asset('js/client/viewOverview.js')}}"></script>
    <script>
        function getAjax(){

            var page = ($( "#hidden-page" ).val() != null)? $( "#hidden-page" ).val() : 1;

            $.ajax({
                url: '{{ route('custom_table') }}?page='+ page,
                type: 'POST',
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                datatype : "json",
                data: {
                    role : "Analyst",
                    search : {
                        field : $( "#search-type" ).val(),
                        value : $( "#search-input" ).val()
                    },
                    filter : {
                        date : {
                            ascending : !$( "#newest-oldest" ).is(":checked"),
                            start : $( "#date-custom-start" ).val(),
                            end : $( "#date-custom-finish" ).val()
                        },
                        id : {
                            ascending : !$( "#largest-to-smallest" ).is(":checked"),
                            start : $( "#custom-problemID-start" ).val(),
                            end : $( "#custom-problemID-end" ).val()
                        },
                        importance : $( "#importance" ).val(),
                        status : $( "#status" ).val()
                    }
                },
                success: function(response){
                    var data = response['request'];
                    console.log(data);
                    $( "#table-content" ).html(response['html']);
                }
            })
        }

        $(document).ready(getAjax());

        function changePage(x){
            var num = parseInt($.trim($( "#hidden-page" ).val()))
            $( "#hidden-page" ).val(num += x);
            getAjax();
        }

        function clearForm(){
            //reset radio buttons
            document.getElementById("oldest-newest").checked = false;
            document.getElementById("newest-oldest").checked = false;
            document.getElementById("smallest-to-largest").checked = false;
            document.getElementById("largest-to-smallest").checked = false;
            //reset text inputs
            document.getElementById("search-input").value = "";
            document.getElementById("date-custom-start").value = "";
            document.getElementById("date-custom-finish").value = "";
            document.getElementById("custom-problemID-start").value = "";
            document.getElementById("custom-problemID-end").value = "";
            //reset select options
            document.getElementById("importance").value = "";
            document.getElementById("status").value = "";
            //update page
            getAjax();
        }
    </script>

@endsection
