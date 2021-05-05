@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css') }}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client.client_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width -->
        
        <div class="heading-flex-end">
            <h2 class="page-title"> Verify Solution </h2>
            <a href = "{{ route('client_problem_view', $problemlog) }}" class="btn-secondary" id="edit-overview-btn">
                View Overview
            </a>
        </div>
        
        <hr class="page-title-hr">

        <!-- ########################################################################### -->
        <!-- Solution section -->
        <div class="information-container" >
            <span> &#x1F6C8 </span>
            <div>
                <b> Confirm solution </b>
                <p> Please read the solution provided by the specialist and decide if this has has solved your problem. </p>
            </div>
        </div>

        <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
            <div class="input-group-header">
                <h3 class="section-heading"> Problem ID : {{ $problemlog->id }}</h3>
            </div>
            <div class="input-group-content">
                <!-- Input field for title -->
                <label for="title" class="label-default"> Title </label> <br>
                <input type="text" name="title" id="query-title-input"class="small-text-input" placeholder="{{ $problemlog->title }}" value="{{ $problemlog->title }}"><br><br>

                <!-- Input field for Description -->
                <label for="description" class="label-default"> Description </label> <br>
                <textarea name="description" id="query-description-input" class="large-text-input">{{ $problemlog->description }}</textarea> <br><br>

                <!-- Input field for Solution -->
                <label for="solution" class="label-default"> Solution </label> <br>
                <textarea name="solution" id="query-solution-input" class="large-text-input">{{ $problemHistory->solution }}</textarea>

            </div>
        </div>

        <label for="text" class="label-default"> Did the solution solve your problem? </label>
        <h4 class="italic-light"> <em> Please mark the problem as NO, if the solution is unclear or it does not solve yor problem. </em> </h4>

        <button type="button" class="btn-primary-success" id="yes-btn" name = "yes-btn" onclick="location.href = '{{ route('client_problem_view_worked', $problemlog) }}';">Yes</button>
        <button type="button" class="btn-primary-failure" id="no-btn" name = "no-btn" onclick="location.href = '{{ route('client_problem_view_did_not_work', $problemlog) }}';">No</button>
    </div>
@endsection