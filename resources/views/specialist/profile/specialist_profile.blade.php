@extends('base')
@section('style')
<link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection


@section('content')
    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container flex">
         @include('specialist.profile.specialist_profile_nav_template')


        <div class="content-container">
        
            <!-- User information  is displayed on a table -->
            <div id="emp-info-parent">
                <div class="emp-info-child">
                    <table id="emp-generic-detail">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ auth()->user()->employee->id }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td> {{ auth()->user()->employee->forename . ' ' . auth()->user()->employee->surname  }} </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ auth()->user()->employee->email_address }}</td>
                            </tr>
                            <tr>
                                <th>Department</th> <!-- could remove this data row if you wish to -->
                                <td>{{ auth()->user()->employee->job->type }}</td>
                            </tr>
                            <tr>
                                <th>Job Title</th>
                                <td>{{ auth()->user()->employee->job->title }}</td>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <td> {{ auth()->user()->employee->branch->phone_number_base . ' ext ' . auth()->user()->employee->phone_number_extension  }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="emp-info-child">
                    <table id="emp-branch-detail">
                        <tbody>
                            <tr>
                                <th>Branch Address</th>
                            </tr>
                            <tr>
                                <td>
                                    {{ auth()->user()->employee->branch->address_line_1 }} <br>
                                    {{ auth()->user()->employee->branch->address_line_2 }} <br>
                                    {{ auth()->user()->employee->branch->city }} <br>
                                    {{ auth()->user()->employee->branch->postcode }}  <br>
                                    {{ auth()->user()->employee->branch->country }}

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <br> <hr>


            <div id="availability"  class="input-group-holder">
                <h3 class="section-heading"> Availability </h3>
                <p>You  are unavailable on the following days, click on any of the row to modify your availability</p>
                <br>

                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                            scroll feature so they view all the fields in the table  -->

                    <table class="normal-table hover-cursor-on-table">
                        <tr>
                            <th> Start </th>
                            <th> End </th>
                            <th style="width:80%"> Reason </th>
                        </tr>
                            <td> 26/10/2021 </td>
                            <td> 26/11/2021 </td>
                            <td> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, commodi!</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr>
        
            <div id="language" class="input-group-holder">
                <h3 class="section-heading">  Language   </h3>
                <p> English </p>
            </div>
            <hr>

            <div id="working-days" class="input-group-holder">
                <h3 class="section-heading"> Working Days </h3>
                <p> Monday, Tuesday, Wednesday, Thursday </p>
            </div>
            <hr>

        

            
            

        </div>

    </div>

@endsection