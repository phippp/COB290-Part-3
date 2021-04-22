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
            <!-- Displaying Working days as table with checkbox next to it(to indicate selected days there are working)  -->
            <h3 class="section-heading"> Working days </h3>
            <p class="italic-light"> Please tick / untick the boxes appropriately to indicate which days you are working </p>
            <br>

            <form action="">

                <div class="scrolltable-x">

                <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table" style="max-width: 20rem;">
                        <tr>
                            <td> <input type="checkbox" name="monday" id="" class="solution-checkbox"> </td>
                            <td> Monday </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="tuesday" id="" class="solution-checkbox"> </td>
                            <td> Tuesday </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="wednesday" id="" class="solution-checkbox"> </td>
                            <td> Wednesday </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="thursday" id="" class="solution-checkbox"> </td>
                            <td> Thursday </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="friday" id="" class="solution-checkbox"> </td>
                            <td>  Friday </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="saturday" id="" class="solution-checkbox"> </td>
                            <td> Saturday </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="sunday" id="" class="solution-checkbox"></td>
                            <td> Sunday </td>
                        </tr>
                    </table>
                </div>

                <button type="submit" class="btn-primary"> Change </button>
            </form>

        </div>

    </div>

@endsection