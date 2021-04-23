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

                        <input type="text" name="" id="search-input">
                        <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                    </div>

                </div>


                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <table class="normal-table">
                        <tr>
                            <th style="width:25%;"> Cases Reported </th>
                            <th> Category </th>
                        </tr>
                        <tr>
                            <td> 530 </td>
                            <td>  Lorem, ipsum. </td>
                        </tr>
                    </table>
                </div>

                <!-- Pagination for table -->
                <div class="table-property-container">
                    <div class="pagination">
                        <a href="#"> &#x276E </a>
                        <span id="page-number"> 1 </span>
                        <span> / 16 </span>
                        <a href="#"> &#x276F </a>
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

                        <input type="text" name="" id="search-input">
                        <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                    </div>

                </div>


                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <table class="normal-table">
                        <tr>
                            <th style="width:25%;"> Cases Reported </th>
                            <th style="width:25%;"> Time spent </th>
                            <th> Category </th>
                        </tr>
                        <tr>
                            <td> 530 </td>
                            <td>  2hr </td>
                            <td>  Lorem, ipsum. </td>
                        </tr>
                    </table>
                </div>

                <!-- Pagination for table -->
                <div class="table-property-container">
                    <div class="pagination">
                        <a href="#"> &#x276E </a>
                        <span id="page-number"> 1 </span>
                        <span> / 16 </span>
                        <a href="#"> &#x276F </a>
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

@endsection