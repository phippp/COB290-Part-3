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
        <h2> Logbook </h2> <br>
        @if ($problemlogs->count())
        <!-- This section will be concerned with displaying all the cases the specialist is allocated   -->
        <div class="cases-reported-section">
            <br>
            <!--
                ######################################################################################
                Filter section
                Giving them the option to filter  or search through cases (which the specialist is assigned)
                ######################################################################################
            -->

            <!-- Search section, responsible for displaying all the option the user can search by to quickly identify a case which they have reported -->
            <div class="search-section">
                <div id="search-by-form">
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
                    <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                </div>

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




            <!--
                ######################################################################################
                RECORDS - Displaying all the records that was issued by them in a table format
                ######################################################################################
            -->
            <div id="table-content">
                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <input style="display: none" readonly type="number" name="hidden-page" id="hidden-page" value="{{ $problemlogs->currentPage() }}">
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
                        </tr>
                        @foreach ($problemlogs as $problemlog)
                        <?php $a = route('log_overview', $problemlog); ?>
                        <tr onclick= "window.location.href='<?=$a?>' " >
                            <td> {{ $problemlog->created_at->format('d/m/Y') }}</td>
                            <td> {{ $problemlog->id }} </td>
                            <td> {{ $problemlog->title}} </td>
                            <td> {{ $problemlog->problemType->problem_type }} </td>
                            <td> {{ $problemlog->status }} </td>
                            <td> {{ $problemlog->importance }} </td>
                        </tr>
                    @endforeach
                    </table>
                </div>

                <div class="table-property-container">
                    <div class="pagination">
                        @if (!$problemlogs->onFirstPage())
                            <a href="{{ $problemlogs->previousPageUrl() }}"> &#x276E </a>
                        @endif
                        <span id="page-number">{{ $problemlogs->currentPage() }}</span>
                        <span> / {{ $problemlogs->lastPage() }}</span>
                        @if ($problemlogs->hasMorePages())
                            <a href="{{ $problemlogs->nextPageUrl() }}"> &#x276F </a>
                        @endif
                    </div>
                </div>

                @else
                    <div>
                        No problems reported.
                    </div>
                @endif
            </div>

            <!--
                ######################################################################################
                END OF RECORDS/ TABLE SECTION
                ######################################################################################
            -->
            <br>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('js/client/dashboard.js') }}"></script>
    {{-- THIS CANNOT BE MOVED TO A JS FILE --}}
    <script type="text/javascript">
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
                    search : {
                        field : $( "#search-type" ).val(),
                        value : $( "#search-input" ).val()
                    },
                    filter : {
                        role : "Specialist",
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
                        title : $( "#problemTitle" ).val(),
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
    </script>


@endsection
