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

            <div id="add-availability-section">
                <h3 class="section-heading"> Add Availability </h3>
                <p class="italic-light"> Please fill in the form to notify the system of your availability </p>
                <br>

                <form action="">
                    <div class="flex-input-container">
                        <div id="start-date">
                            <label for="start-date" class="label-default"> Start Date <span class="required-field">*</span> </label><br>
                            <input type="date" name="start-date" class="small-text-input">
                        </div>
                        
                        <div id="end-date">
                            <label for="end-date" class="label-default"> End Date <span class="required-field">*</span> </label><br>
                            <input type="date" name="end-date" class="small-text-input">
                        </div>
                    </div>
                    <br>
                    
                    <div id="reason-container">
                        <label for="available-reason" class="label-default">Reason <span class="required-field">*</span></label><br>
                        <textarea name="available-reason" class="large-text-input"></textarea>
                    </div> <br>

                    <button type="submit" class="btn-primary"> Add  Availability</button>
                </form>
            </div>
            <br> <hr> <br>
            
            <div id="show-current-availability">
                <h3 class="section-heading"> Current Availability </h3>
                <p class="italic-light">You are unavailable on the following days, click on any of the row to modify your availability</p>


                <!-- Displaying all the records of their availability in the system -->
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

        </div>

    </div>

@endsection