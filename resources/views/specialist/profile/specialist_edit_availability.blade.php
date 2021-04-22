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
                <h3 class="section-heading"> Edit Availability </h3>
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

                    <button type="submit" name="edit" class="btn-primary"> Edit </button>
                    <button type="submit" name="delete" class="btn-primary-failure"> Remove </button> <!-- This delete/remove btn can be removed. I thought it would be useful btn if their vacation is cancelled. -->
                </form>
            </div>
            <br> <hr> <br>

        </div>

    </div>

@endsection