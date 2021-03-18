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
                    <a href="{{route('client')}}"> Dashboard </a>
                    <a href="{{route('registerProblem')}}" class="nav-link-active"> Register </a>
                </div>

                <!-- All the secondary navigation link goes here -->
                <div id="secondary-nav-links">
                    <a href="#" id="current-emp-name"> {{auth()->user()->employee->forename}} {{auth()->user()->employee->surname}} </a>
                    <!-- The div contains all the navigation link we want to show when the user hovers over nav section-->
                    <div class="drop-down-nav">
                        <a href="#"> Language </a>
                        <a href="#"> Logout </a>
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <button> Logout </button>
                        </form>
                    </div>
                </div>

            </nav>
        </div>
        <!-- end of navigation -->


        <!-- Input Section, the client enters the required fields to proceed with registering a new problem -->
        <div class="page-container">
            <form action="#" method="get">
                <h1>Register</h1>
                <hr class="line">
                <!-- Input details -->
                <h3>Enter the appropriate equipment details</h3>
                <br>
                <div class="inputcollection">
                    <div class="inputs">
                        <h4>Application Software</h4>
                        <input class="inputText" type="text" name="" id="ApplicationSoftware-input">
                    </div>

                    <div class="inputs">
                        <h4>Operating System</h4>
                        <input class="inputText" type="text" name="" id="operatingSystem-input">
                    </div>
                </div>
                <p class="either">Either</p>
                <br>
                <div class="inputs">
                    <h4>Serial Number</h4>
                    <input class="inputText" type="text" name="" id="serialNumber-input">
                </div>
                <hr class="line">
                <h3>Notes</h3>
                <br>
                <div class="inputs">
                    <h4>Title</h4>
                    <input class="inputText" type="text" name="" id="title-input">
                </div>
                <div class="inputs">
                    <h4>Description</h4>
                    <input class="inputText" type="text" name="" id="description-input">
                </div>

                <hr class="line">
                <h3>Category</h3>
                <br>
                <div class="inputcollection">
                    <div class="inputs">
                        <h4>General Category</h4>
                        <input class="inputText" type="text" name="" id="generalCategory-input">
                    </div>

                    <div class="inputs">
                        <h4>Specific Category</h4>
                        <input class="inputText" type="text" name="" id="specificCategory-input">
                    </div>
                </div>
                <!-- Reset Button -->
                <button class="reset" type="reset"> <img src="{{ asset('images/recycle.png')}}" alt="reset" srcset=""> Reset </button>
                <hr class="line">

                <!-- End of input section -->

                <!-- Table Section -->
                <div class="scrolltable-x">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table hover-cursor-on-table">
                        <tr>
                            <th></th>
                            <th> Problem ID </th>
                            <th style="width:30%">Problem Title</th>
                            <th> Equipment </th>
                            <th> Solution </th>
                        </tr>

                        <tr>
                            <td><input type="checkbox" id="check" name="check" value="check"></td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="check1" name="check" value="check1"></td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                        </tr>
                    </table>
                </div>
            </form>

            <!-- Btn to submit the whole fom to register the problem -->
            <button class="submit" type="submit"> Submit </button>
        </div>
@endsection
