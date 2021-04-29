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

        <div class="stats-card-section">
            <div class="stats-card-container">
                <div class="stats-card">
                    <h4> Cases assigned today. </h4>
                    <h3> </h3>   <!-- making the numeric data look bigger than their description to give them more importance -->
                </div>
                <div class="stats-card">
                    <h4> Stats </h3>
                    <h3>   </h3>
                </div>
                <div class="stats-card">
                    <h4> Stats </h4>
                    <h3>   </h3>
                </div>

                <div class="stats-card">
                    <h4> Stats </h4>
                    <h3>   </h3>   
                </div>
            </div>
        </div>
        <!-- end of displaying stats data -->
        <!--
            ######################################################################################
            END OF STATS SECTION
            ######################################################################################
         -->
        <br><br>
        <div class="stats-card-section">
            <h2> Monthly Data </h2>
            
            <div class="stats-card-container-analyst">
                <div class="stats-card">
                </div>

                <div class="stats-card">
                </div>
            </div>
            <div class="stats-card">
            </div>
        <div>

        <br>
        <div class="stats-card-section">
            <h2> Yearly Data </h2>
            
            <div class="stats-card">
            </div>
        <div>

@endsection