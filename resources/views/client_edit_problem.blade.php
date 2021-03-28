@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <style>
        body{
            background-color: #F4F5F7;
        }
    </style>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="heading-flex-end">
                <h2 class="page-title"> Edit Problem </h2>
        </div>
        <hr class="page-title-hr">


        <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
            <div id="problem-id-info">
                <h2> Problem ID : {{ $problemlog->id }} </h2>
                <h4> Issued : {{$problemlog->created_at->format('d/m/Y g:ia')}} </h4>
                <br>
            </div>
        </div>

        <hr>

        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="#" method="post">
            @csrf
            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->

                <h3 class="section-heading"> Enter the appropriate equipment details. </h3>

                <div class="flex-input-container">
                    <!-- Operating system input -->
                    <div id="select-os">
                        <label for="operating-system" class="label-default">Operating system</label> <br>
                        <input type="text" name="operating-system" id="os-system" class="small-text-input" placeholder="{{ ($problemlog->operating_system_id != null)?$problemlog->operatingSystem->operating_system_name:"-" }}" value="{{ ($problemlog->operating_system_id != null)?$problemlog->operatingSystem->operating_system_name:"" }}">
                    </div>

                    <!-- Application software input -->
                    <div id="select-app-software">
                        <label for="app-software" class="label-default">Application Software</label> <br>
                        <input type="text" name="app-software" id="app-software" class="small-text-input" placeholder="{{ ($problemlog->software_id != null)?$problemlog->software->name:"-" }}" value="{{ ($problemlog->software_id != null)?$problemlog->software->name:"" }}">
                    </div>
                </div>
                <br>

                <div class="flex-input-container">
                    <!-- Hardware input section -->
                    <div id="hardware-section">
                        <label for="serial-num" class="label-default">Serial Number</label> <br>
                        <input type="text" name="serial-num" id="hardware-input" class="small-text-input" placeholder="{{ ($problemlog->hardware_id != null)?$problemlog->hardware->serial_num:"-" }}" value="{{ ($problemlog->hardware_id != null)?$problemlog->hardware->serial_num:"" }}">
                    </div>
                </div>
            </div>
            <hr>

            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
                <h3 class="section-heading" class="label-default">  Notes   </h3>

                <!-- Input field for title -->
                <label for="title" class="label-default"> Title </label> <br>
                <input type="text" name="title" id="query-title-input"class="small-text-input" placeholder="{{ $problemlog->title }}" value="{{ $problemlog->title }}"> <br>


                <!-- Input field for Description -->
                <label for="description" class="label-default">Description </label> <br>
                <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                <textarea name="description" id="query-description-input" class="large-text-input" >{{ $problemlog->description }}</textarea>
            </div>
            <hr>

            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
                <h3 class="section-heading">  Category   </h3>

                @if($problemlog->problemType->parentProblem != null)

                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">
                            <label for="generic-category" class="label-default"> General category </label> <br>
                            <input type="text" name="generic-category" id="generic-category" class="small-text-input" value="{{ $problemlog->problemType->parentProblem->problem_type }}" >

                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific-category" class="label-default"> Specific category</label> <br>
                            <input type="text" name="specific-category" id="specific-category" value="{{ $problemlog->problemType->problem_type }}">

                        </div>
                    </div>

                @else

                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">
                            <label for="generic-category" class="label-default"> General category </label> <br>
                            <input type="text" name="generic-category" id="generic-category" class="small-text-input" value="{{ $problemlog->problemType->problem_type }}">

                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific-category" class="label-default"> Specific category</label> <br>
                            <input type="text" name="specific-category" id="specific-category" value="N/A">

                        </div>
                    </div>

                @endif

                <button type="button" id="reset-category-list" class="secondary-btn"> &#x27F3 Reset options </button>

            </div>

            <!-- ########################################################################### -->
            <!-- Option: choose a solution or allocate to a specialist -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-provide-solution" class="toggle-button toggle-selected" value="Provide solution" onclick="displayAppropriateInputField('Solution')">
                <input type="hidden" id="option-selected" name="option-selected" value="Solution"> <!-- this tag is there to help the backend team determine which section to validate-->
                <input type="button" id="toggle-assign-specialist" class="toggle-button" value="Assign specialist" onclick="displayAppropriateInputField('Specialist')">
            </div>
            <br>


            <div id="recommended-solution-section">
                <!-- Place guidance for the user here, what to do when they come to solution section -->

                <!-- Displaying all the records they have registered in the system -->
                <div class="scrolltable-x">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                        scroll feature so they view all the fields in the table  -->

                    <table class="normal-table">
                        <tr>
                            <th>  </th> <!-- this columns is for the checkbox so the user is able to select any solution that could have helped them -->
                            <th style="width:10%" > Problem ID </th>
                            <th style="width:40%"> Problem Title </th>
                            <th> Equipment </th>
                            <th> Solution </th>
                        </tr>

                        @foreach($logs as $solution)
                            @php($last = $solution->notes->last())
                            <tr>
                                <td><input type="checkbox" name="name1"  class="solution-checkbox"/></td>
                                <td> {{ $solution->id }} </td>
                                <td> {{ $solution->title}} </td>
                                @if($solution->software_id != null && $solution->hardware_id != null) <td> {{ $solution->software->name }} & {{ $solution->hardware->name }}</td>
                                @elseif($solution->software_id != null) <td> {{ $solution->software->name }} </td>
                                @else <td> {{ $solution->hardware->name }} </td>
                                @endif
                                <td> @if(!empty($last)){{ $last->solution }}@endif </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>

            <div id="assign-specialist-section" class="container-hide">
                <label for="specialist-location" class="label-default"> Specialist location </label> <br>
                <select name="operating-system" id="os-system" class="select-default" >
                    <option value="anywhere"> Anywhere </option>
                    <option value="near-you"> Near you </option>
                </select>

                <br> <br>
                <!-- Importance level to indicate how this problem is effecting the client's work / productivity -->
                <label for="importance-level" class="label-default">Importance level </label> <br>
                <select name="importance-level" id="importance-level-input" class="select-default" >
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>
            </div>


            <!-- Submit button for form -->
            <button id="query-submit-btn" class="primary-form-button" type="submit" name="submit"> Submit  &#8594; </button>

        </form>
    </div>

    <script src="{{ asset('js/client/register.js')}}"></script>

@endsection
