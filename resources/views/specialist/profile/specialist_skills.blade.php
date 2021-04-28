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
            <!-- Write code here   -->
            <div class="heading-flex-end">
                <h3 class="section-heading"> Skills </h3>
                <a href="{{ route('specialist_skills_edit') }}" id="edit-overview-btn"> ✎ Edit </a>
            </div>
            <hr>

            <div id="skills-record-table">
                <!-- Displaying all the skills assigned to the specialist -->
                <div class="scrolltable-x">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                            scroll feature so they view all the fields in the table  -->

                    <table class="normal-table hover-cursor-on-table">
                        <tr>
                            <th> Specialism </th>
                        </tr>
                        @foreach($problems as $problem)
                            <tr>
                                <td> {{$problem->problem_type}} </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
