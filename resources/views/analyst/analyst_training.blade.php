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
        <h2>Training</h2> <br>

        <div class="white-bg-card">
            <!-- Adding a toggle for hardware and software -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-client" class="toggle-button toggle-selected" value="Client"  onclick="toggleForTrainingData('Client')" >
                <input type="button" id="toggle-specialist" class="toggle-button" value="Specialist" onclick="toggleForTrainingData('Specialist')">
            </div> <br><br>

            <!-- ########################################################################### -->
            <!-- Client Data -->
            <div id="client-section">
                <!-- Displaying search by feature-->
                <div class="search-section">

                    <div id="search-by-form">
                        <label for="type">Search By:</label>

                        <select name="type" id="search-type">
                            <option value="type"> Category </option>
                        </select>

                        <input type="text" name="client-search" id="search-input">
                        <button onclick="getAjax('client')"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                    </div>

                </div>

                <div id="client-container">
                    <!-- Displaying all the records they have registered in the system -->
                    <input style="display: none" readonly type="number" name="hidden-page" id="client-page" value="{{ $problems->currentPage() }}">

                    <div class="scrolltable-x">

                        <table class="normal-table">
                            <tr>
                                <th style="width:25%;"> Cases Reported </th>
                                <th> Category </th>
                            </tr>
                            @foreach($problems as $problem)
                                <tr>
                                    <td> {{ $problem->problem_logs_count}} </td>
                                    <td> {{ $problem->problem_type }} </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <!-- Pagination for table -->
                    <div class="table-property-container">
                        <div class="pagination">
                            <a href="#"> &#x276E </a>
                            <span id="page-number"> 1 </span>
                            <span> / 10 </span>
                            <a href="#"> &#x276F </a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ########################################################################### -->
            <!-- Specialist Data -->
            <div id="specialist-section" class="container-hide">
                <!-- Displaying search by feature-->
                <div class="search-section">

                    <div id="search-by-form">
                        <label for="type">Search By:</label>

                        <select name="type" id="search-type">
                            <option value="type"> Category </option>
                        </select>

                        <input type="text" name="specialist-search" id="search-input">
                        <button onclick="getAjax('specialist')"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                    </div>

                </div>


                <!-- Displaying all the records they have registered in the system -->

                <div id="specialist-container">

                    <input style="display: none" readonly type="number" name="hidden-page" id="specialist-page" value="{{ $problems->currentPage() }}">

                    <div class="scrolltable-x">

                        <table class="normal-table">
                            <tr>
                                <th style="width:25%;"> Cases Reported </th>
                                <th style="width:25%;"> Time spent </th>
                                <th> Category </th>
                            </tr>
                            @foreach($problems as $problem)
                                <tr>
                                    <td> {{ $problem->problem_logs_count}} </td>
                                    @php($hours = 0)
                                    @foreach($problem->problemLogs as $log)
                                        @if($log->solved_at != null)
                                            @php($hours += $log->created_at->diffInHours($log->solved_at))
                                        @else
                                            @php($hours += $log->created_at->diffInHours(\Carbon\Carbon::now()))
                                        @endif
                                    @endforeach
                                    <td> {{ number_format($hours / $problem->problem_logs_count,0) }} hour(s) </td>
                                    <td> {{ $problem->problem_type }} </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <!-- Pagination for table -->
                    <div class="table-property-container">
                        <div class="pagination">
                            <a href="#"> &#x276E </a>
                            <span id="page-number"> 1 </span>
                            <span> / 10 </span>
                            <a href="#"> &#x276F </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div>


    <script>
        function toggleForTrainingData(btnClicked){
            // Getting the 2 input 'button' so we can add css styling to show which is selected and which is not

            var btnClient = document.querySelector('#toggle-client')
            var btnSpecialist = document.querySelector('#toggle-specialist')

            var clientSection = document.querySelector('#client-section')
            var specialistSection = document.querySelector('#specialist-section')
            if(btnClicked == "Client"){
                // If the 'Provide Solution' button is clicked, we only show the solution section
                btnClient.classList.add('toggle-selected')
                btnSpecialist.classList.remove('toggle-selected')
                clientSection.classList.remove("container-hide")
                specialistSection.classList.add("container-hide")
            } else if (btnClicked == "Specialist"){
                // If the 'Assign Specialist' button is clicked, we will not show the problem ID section
                btnSpecialist.classList.add('toggle-selected')
                btnClient.classList.remove('toggle-selected')
                clientSection.classList.add("container-hide")
                specialistSection.classList.remove("container-hide")
            }

        }
    </script>

    <script>

        function getAjax(table){

            var search,page;

            if(table == "specialist"){
                search = document.getElementsByName('specialist-search')[0].value;
                page = document.getElementById("specialist-page").value;
            } else {
                search = document.getElementsByName('client-search')[0].value;
                page = document.getElementById("client-page").value;
            }

            $.ajax({
                url: '{{ route('training_table') }}?page='+page ,
                type: 'POST',
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                datatype : "json",
                data: {
                    search: search,
                    time: table == 'specialist'
                },
                success: function(response){
                    var data = response['html'];
                    console.log(response['specialist']);
                    if(response['specialist'] == 'true'){
                        document.getElementById('specialist-container').innerHTML = data;
                    }else{
                        document.getElementById('client-container').innerHTML = data;
                    }
                }
            })

        }

        $(document).ready(function(){
            getAjax('client');
            getAjax('specialist');
        });


        function changePage(x,table){
            var num = parseInt($.trim($( "#"+table+"-page" ).val()))
            $( "#"+table+"-page" ).val(num += x);
            getAjax(table);
        }

    </script>

@endsection
