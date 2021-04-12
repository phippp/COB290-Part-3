@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css') }}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->
        
        <div class="heading-flex-end">
            <h2 class="page-title"> Verify Solution </h2>
            <a href=# class="btn-secondary" id="edit-overview-btn">
                View Overview
            </a>
        </div>
        
        <hr class="page-title-hr">

        <!-- ########################################################################### -->
        <!-- Solution section -->
        <div class="information-container" >
            <span> &#x1F6C8 </span>
            <div>
                <b> Please read the solution provided by the specialist and inform the specialist if it has solved your problem </b>
            </div>
        </div>

        <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
            <div class="input-group-header">
                <h2> Problem ID : </h2>
            </div>
            <div class="input-group-content">
                <!-- Input field for title -->
                <label for="title" class="label-default"> Title </label> <br>
                <input type="text" name="title" id="query-title-input"class="small-text-input"> <br><br>

                <!-- Input field for Description -->
                <label for="description" class="label-default"> Description </label> <br>
                <textarea name="description" id="query-description-input" class="large-text-input"></textarea> <br><br>

                <!-- Input field for Solution -->
                <label for="solution" class="label-default"> Solution </label> <br>
                <textarea name="solution" id="query-solution-input" class="large-text-input"></textarea>

            </div>
        </div>

        <label for="text" class="label-default"> Did the solution solve your problem? </label>
        <h4 class="italic-light"> <em> Please mark the problem as NO, if the solution is unclear or it does not solve yor problem. </em> </h4>

        <button type="button" class="btn-secondary" id="yes-btn">Yes</button>
        <button type="button" class="btn-secondary" id="no-btn">No</button>
    </div>
@endsection