@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script>
        // needed this data so we can automatically select & load generic and specific category.
        const genericCategory = @json($genericCategory, JSON_PRETTY_PRINT);
        const specificCategory = @json($specificCategory, JSON_PRETTY_PRINT);
        const organizedCategory = @json($organizedCategory, JSON_PRETTY_PRINT);
    </script>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client.client_navigation')

    <!-- Page content -->
    <div class="page-container">
        <h2 class="page-title"> Register </h2>
        <hr class="page-title-hr">



        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="#" method="post">
            @csrf
            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading">  Enter the appropriate equipment details <span class="required-field">*</span>  </h3>
                </div>

                <div class="input-group-content">
                    <!-- Asking the user for their input on software and hardware so we can check if they are licensed or not -->
                    <div class="flex-input-container">
                        <!-- Operating system input -->
                        <div id="select-os">
                            <label for="operating_system" class="label-default">Operating system</label> <br>
                            <select name="operating_system" id="os-system" class="select-default" >
                            <option selected> - </option>
                            @foreach($operatingSystems as $option)
                                <option value = "{{ $option->id }}"> {{ $option->operating_system_name }} </option>
                            @endforeach
                            </select>
                        </div>

                        <!-- Application software input -->
                        <div id="select-app-software">
                            <label for="app_software" class="label-default">Application Software</label> <br>
                            <select name="app_software" id="app-software" class="select-default" >
                                <option selected> - </option>
                                @foreach($software as $option)
                                    <option value = "{{ $option->id }}"> {{ $option->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h4 class="italic-light"><em> OR </em></h4>

                    <!-- Hardware input section -->
                    <div id="hardware-section">
                        <label for="serial_num" class="label-default">Serial Number</label> <br>
                        <input type="text" name="serial_num" id="hardware-input" class="small-text-input">
                    </div>
                </div>
            </div> 

            <!-- ########################################################################### -->
            <!-- Problem Title and description section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading" class="label-default">  Notes   </h3>
                </div>
                
                <div class="input-group-content">
                    <!-- Input field for title -->
                    <label for="title" class="label-default"> Title <span class="required-field">*</span> </label> <br>
                    <input type="text" name="title" id="query-title-input"class="small-text-input" > <br>
                    <!-- Ensuring title field is filled -->
                    @error('title')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror
                    <br>

                    <!-- Input field for Description -->
                    <label for="description" class="label-default">Description <span class="required-field">*</span></label> <br>
                    <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                    <textarea name="description" id="query-description-input" class="large-text-input">{{old('description')}}</textarea>
                    <!-- Ensuring description field is filled -->
                    @error('description')
                    <div style = "color:red; font-size: small" >
                        {{$message}}
                    </div>
                    @enderror

                </div>
            </div>


            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading">  Category   </h3>
                </div>

                <div class="input-group-content">
                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">  <!-- this div is CSS flex child   -->
                            <label for="generic_category" class="label-default">General category <span class="required-field">*</span> </label> <br>
                            <select name="generic_category" id="generic-category" class="select-default" onchange="getSpecificCategoryBasedOnGeneric()">
                                <option selected> - </option>
                                @foreach($genericCategory as $thisCategory)
                                    <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific_category" class="label-default"> Specific category</label> <br>
                            <select name="specific_category" id="specific-category" class="select-default" onchange="getGenericCategoryBasedOnSpecific()">
                            <option selected> - </option>
                            @foreach($specificCategory as $thisCategory)
                                <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="button" id="reset-category-list" class="btn-secondary" onclick="reloadCategoryInfo()"> &#x27F3 Reset options </button>
                </div>

            </div>
            <br>



            <!-- ########################################################################### -->
            <!-- Option: provide a solution or allocate to a specialist -->
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
                            <th style="width:30%" > Title </th>
                            <th style="width:40%"> Solution </th>
                            <th> Category </th>
                            <th> Date solved </th>
                        </tr>
                        <!-- Currently displays all solutions -->
                        <label for="solution_desc" class="label-default"></label>
                        @foreach($solutions as $solution)
                            <tr>
                                <td><input type="checkbox" name="solution_desc"  class="solution-checkbox" value="{{$solution->solution}}"/></td>
                                <td>{{$solution->title}}</td> <!-- Problem title? -->
                                <td>{{$solution->solution}}</td> <!-- Solution description -->
                                <td>{{$solution->problem_id}}</td> <!-- Problem category -->
                                <td>{{$solution->solved_at}}</td><!-- Date solved/ Last edited? -->
                            </tr>
                        @endforeach
                    </table>

                </div>
                <!-- Submit button for form -->
                <button id="query-submit-btn" class="btn-primary" type="submit" name="submitSol" value = "sol"> Submit  &#8594; </button>
            </div>

            <div id="assign-specialist-section" class="container-hide">
                <label for="specialist_location" class="label-default"> Specialist location </label> <br>
                <select name="specialist_location" id="specialist-location" class="select-default" >
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

                <!-- Submit button for form -->
                <br><br>
                <button id="query-submit-btn" class="btn-primary" type="submit" name="submitSpec" value = "spec"> Submit  &#8594; </button>

            </div>

        </form>
    </div>

    <script src="{{ asset('js/client/register.js')}}"></script>
@endsection
