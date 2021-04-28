@extends('base')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection

@section('content')
    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container sidebar-page-container">
        @include('specialist.profile.specialist_profile_nav_template')

        <div class="content-container">

            <div id="add-availability-section">
                <h3 class="section-heading"> Add Availability </h3>
                <p class="italic-light"> Please fill in the form to notify the system of your availability </p>
                <br>

                <form action="#" method="post">
                    @csrf
                    <div class="flex-input-container">
                        <div id="start-date">
                            <label for="start_date" class="label-default"> Start Date <span class="required-field">*</span> </label><br>
                                @error('start_date')
                                    <div style = "color:red; font-size: small">
                                        {{$message}}
                                    </div>
                                @enderror
                            <input type="date" name="start_date" class="small-text-input">
                        </div>

                        <div id="end-date">
                            <label for="end_date" class="label-default"> End Date <span class="required-field">*</span> </label><br>
                                @error('end_date')
                                    <div style = "color:red; font-size: small">
                                        {{$message}}
                                    </div>
                                @enderror
                            <input type="date" name="end_date" class="small-text-input">
                        </div>
                    </div>
                    <br>

                    <div id="reason-container">
                        <label for="available_reason" class="label-default">Reason <span class="required-field">*</span></label>
                            @error('available_reason')
                                <div style = "color:red; font-size: small">
                                    {{$message}}
                                </div>
                            @enderror
                        <textarea name="available_reason" class="large-text-input"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn-primary" name="submit" value="submit"> Add  Availability </button>
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
                        @foreach($availabilities as $available)
                            <td>{{$available->start_date}}</td>
                            <td>{{$available->end_date}}</td>
                            <td>{{$available->reason}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>


            </div>

        </div>

    </div>

@endsection
