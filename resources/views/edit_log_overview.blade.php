@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="heading-flex-end">
                <h2 class="page-title"> Edit </h2>
        </div>
        <hr class="page-title-hr">

        <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
            <div id="problem-id-info">
                <h2> Problem ID : {{ $problemlog->id }} </h2>
                <h4> Created At : {{$problemlog->created_at->format('d/m/Y g:ia')}} </h4>
            </div>
        </div>

        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="#" method="post">
            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
                <div class="problem-status ">
                    <div id="problem-status-title"> Problem Status </div>
                    <input type="text" name="query-status" class="small-text-input">
                </div>
            </div>

            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
                <h3 class="section-heading"> Employee Details </h3>

                <div id="emp-info-parent">
                    <div class="emp-info-child">
                        <table id="emp-generic-detail">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{$problemlog->client_id}}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{$problemlog->reportedBy->forename}} {{$problemlog->reportedBy->surname}}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{$problemlog->reportedBy->email_address}}</td>
                                </tr>
                                <tr>
                                    <th>Job Title</th>
                                    <td>{{$problemlog->reportedBy->job->title}}</td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td>{{$problemlog->reportedBy->branch->phone_number_base}} ext. {{$problemlog->reportedBy->phone_number_extension}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="emp-info-child">
                        <table id="emp-branch-detail">
                            <tbody>
                                <tr>
                                    <th>Branch Address</th>
                                </tr>
                                <tr>
                                    <td>
                                        {{$problemlog->reportedBy->branch->address_line_1}} <br/>
                                        {{$problemlog->reportedBy->branch->address_line_2}} <br/>
                                        {{$problemlog->reportedBy->branch->city}} <br/>
                                        {{$problemlog->reportedBy->branch->country}} <br/>
                                        {{$problemlog->reportedBy->branch->postcode}}
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr>

            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
                <button type="button" class="secondary-btn" id="add-call" > + Add Call Records </button>
                <button type="button" class="secondary-btn" id="prev-call-records" onclick="callRecords()">&#x2706 View Previous Call Records ({{$problemlog->calls->count()}})</button>
                <div id="call-record-table" class="scrolltable-x container-hide">
                    <table class="normal-table">
                        <tr>
                            <th> Call Time </th>
                            <th> Received By </th>
                            <th id="call-record-description"> Record </th>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->

                <h3 class="section-heading"> Enter the appropriate equipment details. <span class="required-field">*</span>   </h3>

                <div class="flex-input-container">
                    <!-- Operating system input -->
                    <div id="select-os">
                        <label for="operating-system" class="label-default">Operating system</label> <br>
                        <select name="operating-system" id="os-system" class="select-default" >
                            <option selected> - </option>
                        </select>


                    </div>

                    <!-- Application software input -->
                    <div id="select-app-software">
                        <label for="app-software" class="label-default">Application Software</label> <br>
                        <select name="app-software" id="app-software" class="select-default" >
                                <option selected> - </option>
                        </select>
                    </div>
                </div>


                <h4 class="italic-light"> <em> OR </em> </h4>

                <!-- Hardware input section -->
                <div id="hardware-section">
                    <label for="serial-num" class="label-default">Serial Number</label> <br>
                    <input type="text" name="serial-num" id="hardware-input" class="small-text-input">
                </div>
            </div>

            <hr>

            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
                <h3 class="section-heading" class="label-default">  Notes   </h3>

                <!-- Input field for title -->
                <label for="title" class="label-default"> Title  <span class="required-field">*</span></label> <br>
                <input type="text" name="title" id="query-title-input"class="small-text-input"> <br>


                <!-- Input field for Description -->
                <label for="description" class="label-default">Description <span class="required-field">*</span> </label> <br>
                <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                <textarea name="description" id="query-description-input" class="large-text-input" ></textarea>

                <button type="button" class="prev-call-btn" id="log-overview-btn" onclick=""> View Previous History </button>
            </div>

            <hr>

            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
                <h3 class="section-heading">  Category   </h3>

                <div class="flex-input-container">
                    <!-- Input section -->
                    <div id="generic-categorization-container">
                        <label for="generic-category" class="label-default"> General category </label> <br>
                        <select name="generic-category" id="generic-category" class="select-default" onchange="getSpecificCategoryBasedOnGeneric()">
                            <option selected> - </option>
                        </select>
                    </div>

                    <div id="specific-categorization-container">
                        <label for="specific-category" class="label-default"> Specific category</label> <br>
                        <select name="specific-category" id="specific-category" class="select-default" onchange="getSpecificCategoryBasedOnGeneric()">
                            <option selected> - </option>
                        </select>
                    </div>
                </div>
            </div>

            <hr>

            <!-- ########################################################################### -->
            <!-- Option: choose a solution or allocate to a specialist -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-provide-solution" class="toggle-button toggle-selected" value="Solution" onclick="displayAppropriateInputField('Solution')">
                <input type="hidden" id="option-selected" name="option-selected" value="Solution"> <!-- this tag is there to help the backend team determine which section to validate-->
                <input type="button" id="toggle-assign-specialist" class="toggle-button" value="Assign specialist" onclick="displayAppropriateInputField('Specialist')">
            </div>
            <br>
            <div id="recommended-solution-section">
                <!-- Place guidance for the user here, what to do when they come to solution section -->
                <!-- Input field for Solution -->
                <label for="solution" class="label-default">Solution <span class="required-field">*</span> </label> <br>
                <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                <textarea name="solution" id="query-description-input" class="large-text-input" ></textarea>
                <br>
                <button type="button" class="secondary-btn" id="prev-fixes" onclick=""> View Previous Fixes </button>
                <br>

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
                    </table>
                </div>
            </div>

            <div id="assign-specialist-section" class="container-hide">
                <label for="specialist" class="label-default">Specialist <span class="required-field">*</span> </label> <br>
                <input type="text" name="specialist" id="specialist" class="small-text-input">
                <a id="edit-overview-btn">&#x270E; Edit</a>
                <div>
                    <label for="specialist" class="label-default">Reason for Change in Specialist <span class="required-field">*</span> </label> <br>
                    <input type="text" name="specialist-change" id="specialist-change" class="large-text-input">
                    <br>
                    <div class="scrolltable-x">
                        <table class="normal-table">
                            <tr>
                                <th>  </th> <!-- this columns is for the checkbox so the user is able to select any solution that could have helped them -->
                                <th> Specialist </th>
                                <th> Name </th>
                                <th> Location </th>
                                <th> Workload </th>
                                <th> Skills </th>
                            </tr>
                        </table>
                    </div>

                    <button type="button" class="primary-form-button" id="change-specialist" onclick=""> Change Specialist </button>
                </div>
                <br>

                <button type="button" class="secondary-btn" id="specialist-history" onclick=""> View Specialist History </button>

                <div>
                    <br>
                    <div class="scrolltable-x">
                        <table class="normal-table">
                            <tr>
                                <th> Selecated At </th> <!-- this columns is for the checkbox so the user is able to select any solution that could have helped them -->
                                <th> Specialist Selected </th>
                                <th> Reason </th>
                                <th> Changed By </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>











            <!-- Submit button for form -->
            <button id="query-submit-btn" class="primary-form-button" type="submit" name="submit"> Submit  &#8594; </button>

        </form>

    </div>

    <script src="{{ asset('js/client/register.js')}}"></script>
@endsection
