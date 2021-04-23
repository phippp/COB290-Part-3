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
        <h2>Equipment</h2> <br>

        <div class="white-bg-card">
            <!-- Adding a toggle for hardware and software -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-hardware" class="toggle-button toggle-selected" value="Hardware" onclick="toggleForEquipment('Hardware')" >
                <input type="button" id="toggle-software" class="toggle-button" value="Software" onclick="toggleForEquipment('Software')">
            </div> <br><br>

            <!-- ########################################################################### -->
            <!-- Hardware -->
            <div id="hardware-section">
                <!-- Displaying search by feature-->
                <div class="search-section">

                    <div id="search-by-form">
                        <label for="type">Search By:</label>

                        <select name="type" id="search-type">
                            <option value="type"> Type </option>
                            <option value="make"> Make </option>
                            <option value="hardwareName"> Name </option>
                            <option value="serialNumber"> Serial Number </option>

                        </select>

                        <input type="text" name="" id="search-input">
                        <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                    </div>

                </div>


                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <table class="normal-table">
                        <tr>
                            <th> Cases Reported </th>
                            <th> Name </th>
                            <th> Serial Number </th>
                            <th> Type </th>
                            <th> Make </th>
                        </tr>
                        <tr>
                            <td> 530 </td>
                            <td>  Lorem, ipsum. </td>
                            <td> 1dfer44-324dfdsf-3</td>
                            <td> TypeLorem </td>
                            <td> MakeLorem </td>
                        </tr>
                        <tr>
                            <td> 530 </td>
                            <td>  Lorem, ipsum. </td>
                            <td> 1dfer44-324dfdsf-3</td>
                            <td> TypeLorem </td>
                            <td> MakeLorem </td>
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
            <!-- Software -->
            <div id="software-section" class="container-hide">
                <!-- Displaying search by feature-->
                <div class="search-section">

                    <div id="search-by-form">
                        <label for="type">Search By:</label>

                        <select name="type" id="search-type">
                            <option value="type"> Name </option>
                        </select>

                        <input type="text" name="" id="search-input">
                        <button onclick=""> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
                    </div>

                </div>


                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">

                    <table class="normal-table">
                        <tr>
                            <th style="width: 25%;"> Cases Reported </th>
                            <th> Name </th>
                        </tr>
                        <tr>
                            <td> 530 </td>
                            <td>  Lorem, ipsum. </td>
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

        </div>
    <div>
    <!-- Javascript to create the toggle effect -->
    <script>
        function toggleForEquipment(btnClicked){
            // Getting the 2 input 'button' so we can add css styling to show which is selected and which is not

            var btnHardware = document.querySelector('#toggle-hardware')
            var btnSoftware = document.querySelector('#toggle-software')
            
            var softwareSection = document.querySelector('#software-section')
            var hardwareSection = document.querySelector('#hardware-section')
            if(btnClicked == "Hardware"){
                // If the 'Provide Solution' button is clicked, we only show the solution section
                btnHardware.classList.add('toggle-selected')
                btnSoftware.classList.remove('toggle-selected')
                softwareSection.classList.add("container-hide")
                hardwareSection.classList.remove("container-hide")
            } else if (btnClicked == "Software"){
                // If the 'Assign Specialist' button is clicked, we will not show the problem ID section
                btnSoftware.classList.add('toggle-selected')
                btnHardware.classList.remove('toggle-selected')
                softwareSection.classList.remove("container-hide")
                hardwareSection.classList.add("container-hide")
            }

        }
    </script>

@endsection