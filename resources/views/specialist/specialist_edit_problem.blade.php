@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css')}}">
    <script>
        // needed this data so we can automatically select & load generic and specific category.
        const genericCategory = @json($genericCategory, JSON_PRETTY_PRINT);
        const specificCategory = @json($specificCategory, JSON_PRETTY_PRINT);
        const organizedCategory = @json($organizedCategory, JSON_PRETTY_PRINT);
    </script>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->
        @if ($errors->any())
            <div class="single-error-container">
                <span> &#10006 </span>
                <div id="call-reason-error-msg">
                    <b> Please fix the issues below to make your desired changes to this problem </b>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="heading-flex-end">
                <h2 class="page-title"> Edit </h2>
        </div>
        <hr class="page-title-hr">


        <!-- ########################################################################### -->
        <!-- Displaying id, date and status of the problem -->
        <div> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
            <div id="problem-id-info">
                <h2> Problem ID : {{ $problemlog->id }} </h2>
                <h4> Issued : {{$problemlog->created_at->format('d/m/Y g:ia')}} </h4>
                <br>
            </div>

            <div class="problem-status ">
                <div id="problem-status-title"> Problem Status </div>
                <select name="query_status" class="select-default">
                    <option value="In-Queue" {{ $problemlog->status == "In-Queue" ? "selected" : "" }} > In-Queue </option>
                    <option value="Verify" {{ $problemlog->status == "Verify" ? "selected" : "" }} > Verify </option>
                    <option value="Solved" {{ $problemlog->status == "Solved" ? "selected" : "" }} > Solved </option>
                </select>
            </div>
        </div>


        <!-- ########################################################################### -->
        <!-- Client information section -->
        <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
            <div class="input-group-header">
                <h3 class="section-heading"> Employee Details </h3>
            </div>

            <div class="input-group-content">
                <!-- Client information displayed on a table -->
                <div id="emp-info-parent">
                    <div class="emp-info-child">
                        <table id="emp-generic-detail">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $problemlog->reportedBy->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td> {{ $problemlog->reportedBy->forename . ' ' . $problemlog->reportedBy->surname  }} </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $problemlog->reportedBy->email_address }}</td>
                                </tr>
                                <tr>
                                    <th>Department</th> <!-- could remove this data row if you wish to -->
                                    <td>{{ $problemlog->reportedBy->job->type }}</td>
                                </tr>
                                <tr>
                                    <th>Job Title</th>
                                    <td>{{ $problemlog->reportedBy->job->title }}</td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td> {{ $problemlog->reportedBy->branch->phone_number_base . ' ext ' . $problemlog->reportedBy->phone_number_extension  }} </td>
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
                                        {{ $problemlog->reportedBy->branch->address_line_1 }} <br>
                                        {{ $problemlog->reportedBy->branch->address_line_2 }} <br>
                                        {{ $problemlog->reportedBy->branch->city }} <br>
                                        {{ $problemlog->reportedBy->branch->postcode }}  <br>
                                        {{ $problemlog->reportedBy->branch->country }}

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>



        <!-- ########################################################################### -->
        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="{{ route('specialist_edit_problem',$problemlog) }}" method="post">
            @csrf

            <input name="hidden_id" value="{{$problemlog->id}}" readonly style="display: none">

            <!-- ########################################################################### -->
            <!-- Add Call and view pervious call record section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading">
                        Call Records
                    </h3>
                </div>

                <div class="input-group-content">
                    <button type="button" class="btn-outline-orange" id="add-call-btn" onclick="displayControllerForAddCall()">+ Add Call Log</button>
                    @if($problemlog->calls->count())
                        <button type="button" class="btn-secondary" id="call-record-btn" onclick="callRecords()">&#x2706 View Call Records ({{$problemlog->calls->count()}})</button>
                    @endif
                    <div id="add-call" class="container-hide">
                        <br>
                        <h3 class="label-default"> Call Description </h3>
                        <textarea name="call_description" id="call-description-input" class="large-text-input" placeholder="Please describe the call here.">{{old('call_description') }} </textarea>
                    </div>

                    @if($problemlog->calls->count())
                        <div id="call-record-table" class="scrolltable-x container-hide">
                            <br>
                            <h3 class="label-default">Records</h3>

                            <table class="normal-table">
                                <tr>
                                    <th> Call Time </th>
                                    <th> Received By </th>
                                    <th id="call-record-description"> Record </th>
                                </tr>

                                @foreach($problemlog->calls as $call)

                                    <tr>
                                        <td> {{ $call->edited_at->format('H:i:s d-m-Y') }} </td>
                                        <td> {{ $call->specialist->forename }} {{ $call->specialist->surname }} </td>
                                        <td> {{ $call->description }} </td>
                                    </tr>

                                @endforeach

                            </table>
                        </div>
                    @endif


                </div>

            </div>
            <hr>




            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->

                <div class="input-group-header">
                    <h3 class="section-heading"> Equipment details. <span class="required-field">*</span>   </h3>
                </div>

                <div class="input-group-content">
                    <div class="flex-input-container">
                        <!-- Operating system input -->
                        <div id="select-os">
                            <label for="operating-system" class="label-default">Operating system</label> <br>
                            <select name="operating_system" id="os-system" class="select-default" >
                                <option value="" selected > - </option>
                                @foreach($operatingSystems as $option)
                                    @if($option->id == $problemlog->operating_system_id)
                                        <option value = "{{$option->id}}" selected> {{$option->operating_system_name}} </option>
                                    @else
                                        <option value = "{{$option->id}}"> {{$option->operating_system_name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- Application software input -->
                        <div id="select-app-software">
                            <label for="app-software" class="label-default">Application Software</label> <br>
                            <select name="app_software" id="app-software" class="select-default" >
                                    <option value="" selected> - </option>
                                    @foreach($software as $option)
                                    @if($option->id == $problemlog->software_id)
                                        <option value = "{{$option->id}}" selected> {{$option->name}} </option>
                                    @else
                                        <option value = "{{$option->id}}"> {{$option->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('app_software')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror
                    @error('operating_system')
                        <div style = "color:red; font-size: small">
                           {{$message}}
                        </div>
                    @enderror

                    <h4 class="italic-light"> <em> OR </em> </h4>

                    <!-- Hardware input section -->
                    <div id="hardware-section">
                        <label for="serial-num" class="label-default">Serial Number</label> <br>
                        <input type="text" name="serial_num" id="hardware-input" class="small-text-input" placeholder="{{ ($problemlog->hardware_id != null)?$problemlog->hardware->serial_num:'-' }}" value="{{ ($problemlog->hardware_id != null)?$problemlog->hardware->serial_num:'' }}">
                    </div>

                    @error('serial_num')
                        <div style = "color:red; font-size: small">
                           {{$message}}
                        </div>
                    @enderror
                </div>




            </div>

            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
                <div class="input-group-header">
                    <h3 class="section-heading">  Category   </h3>
                </div>

                <div class="input-group-content">
                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">
                            <label for="generic-category" class="label-default"> General category </label> <br>
                            <select name="generic_category" id="generic-category" class="select-default" onchange="getSpecificCategoryBasedOnGeneric()">
                                <option value="" selected> - </option>
                                @foreach($genericCategory as $thisCategory)
                                    @if((
                                        $problemlog->problemType->problem_id != null &&
                                        $problemlog->problemType->parentProblem->problem_type == $thisCategory
                                        ) ||
                                        $problemlog->problemType->problem_type == $thisCategory
                                    )
                                        <option value="{{ $thisCategory }}" selected> {{ $thisCategory }}</option>
                                    @else
                                        <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <!-- Ensuring generic category field is filled -->

                        <div id="specific-categorization-container">
                            <label for="specific-category" class="label-default"> Specific category</label> <br>
                            <select name="specific_category" id="specific-category" class="select-default" onchange="getGenericCategoryBasedOnSpecific()">
                                <option value="" selected> - </option>
                                @foreach($specificCategory as $thisCategory)
                                    @if(
                                        $problemlog->problemType->problem_id != null &&
                                        $problemlog->problemType->problem_type == $thisCategory
                                    )
                                        <option value="{{ $thisCategory }}" selected> {{ $thisCategory }}</option>
                                    @else
                                        <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('generic_category')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror


                    <button type="button" id="reset-category-list" class="btn-secondary" onclick="reloadCategoryInfo()"> &#x27F3 Reset options </button>

                </div>

            </div>

            <!-- ########################################################################### -->
            <!-- Title and Problem Description section -->
            <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
                <div class="input-group-header">
                    <h3 class="section-heading" class="label-default">  Problem   </h3>
                </div>

                <div class="input-group-content">
                    <!-- Input field for title -->
                    <label for="title" class="label-default"> Title  <span class="required-field">*</span></label> <br>
                    <input type="text" name="title" id="query-title-input"class="small-text-input" placeholder="{{ $problemlog->title }}" value="{{ $problemlog->title }}"> <br>
                    <!-- Ensuring title field is filled -->
                    @error('title')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror
                    <br>

                    <!-- Input field for Description -->
                    <label for="description" class="label-default">Description <span class="required-field">*</span> </label> <br>
                    <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                    <textarea name="description" id="query-description-input" class="large-text-input" >{{ $problemlog->description }}</textarea>
                    <!-- Ensuring description field is filled -->
                    @error('description')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror
                    <!-- Only render the stuff below if description/solution has been modified from their initial input -->
                    <!-- View history of description and solution btn  -->
                    <hr>

                    <div class="flex" style="gap: 2%">
                        @if($problemlog->notes->count())
                        <button type="button" class="btn-secondary width-100" id="pervious-record-history-btn"  onclick="displayPerviousRecords()"> &#x276E View History ({{$problemlog->notes->count()}}) </button>
                        @endif

                        <button type="button" class="btn-outline-orange width-100" id="edit-notes-btn" onclick="displayAddNotes()"> View/Edit notes </button>
                    </div>

                    <div id="edit-notes-container" class="container-hide">
                        <textarea name="specialist_notes" class="large-text-input" placeholder="Please write any additional notes">@if( $problemlog->notes->reverse()->first()->description != null ){{ $problemlog->notes->reverse()->first()->description }} @endif</textarea>
                    </div>


                    @if($problemlog->notes->count())

                    {{-- <button type="button" class="btn-secondary" id="pervious-record-history-btn"  onclick="displayPerviousRecords()"> &#x276E View History ({{$problemlog->notes->count()}}) </button> --}}

                        <div class="pervious-info-container container-hide" id="pervious-history-container"> <!-- This is container which will show all the pervious description and solution -->

                            @foreach($problemlog->notes as $note)

                                <div class="solution-description-msg"> <!-- This hold information about single change in description and solution -->
                                    <h4 id="modified-info"> Last edited @ {{ $note->created_at }} </h4>
                                    <h4 id="pervious-description-title"> Notes </h4>
                                    <textarea readonly class="pervious-description"> {{ $note->description }} </textarea>
                                    <h4 id="pervious-solution-title"> Solution </h4>
                                    <textarea readonly class="pervious-solution"> {{ $note->solution}} </textarea>
                                </div> <hr>

                            @endforeach

                        </div>

                    @endif


                </div>


            </div>
            @error('specialist')
                <div style = "color:red; font-size: small">
                    {{$message}}
                </div>
                <br>
            @enderror
            @error('specialist_reason')
                <div style = "color:red; font-size: small">
                    {{$message}}
                </div>
                <br>
            @enderror

            <!-- ########################################################################### -->
            <!-- Option: choose a solution or allocate to a specialist -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-provide-solution" class="toggle-button toggle-selected" value="Provide solution" onclick="displayAppropriateInputField('Solution')">
                <input type="hidden" id="option-selected" name="option_selected" value="Solution"> <!-- this tag is there to help the backend team determine which section to validate-->
                <input type="button" id="toggle-assign-specialist" class="toggle-button" value="Assign specialist" onclick="displayAppropriateInputField('Specialist')">
            </div>


            <div id="recommended-solution-section">
                <br>
                <label for="solution" class="label-default">Solution <span class="required-field">*</span> </label> <br>
                <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                <textarea name="solution" id="solution-input" class="large-text-input" >@if( $problemlog->notes->reverse()->first()->solution != null ){{ $problemlog->notes->reverse()->first()->solution }} @endif</textarea>
                <!-- Ensuring solution field is filled -->
                @error('solution')
                    <div style = "color:red; font-size: small">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div id="assign-specialist-section" class="container-hide">
                <br>

                <label for="specialist-id" class="label-default"> Specialist ID </label> <br>
                <input type="number" name="specialist_id" id="specialist-id-input" class="small-text-input" min="1" readonly>
                <button type="button" id="edit-specialist-btn" class="btn-outline-orange" onclick="displayModifySpecialistSection()">
                    &#x270E; Edit
                </button>

                <div id="edit-specialist-container" class="container-hide">
                    <span id="specialist-id-info"> &#x1F6C8  If specialist ID is left empty, the system will automatically select a suitable specialist</span>
                    <br><br>
                    <label for="specialist-reason" class="label-default">Reason for change in specialist <span class="required-field">*</span></label> <br>
                    <textarea name="specialist_reason" id="specialist-reason-input" class="large-text-input"></textarea>
                    <br><br>

                    <label for="specialist_location" class="label-default"> Specialist location </label> <br>
                    <select name="specialist_location" id="specialist-location" class="select-default" >
                        <option value="anywhere"> Anywhere </option>
                        <option value="near-you"> Near client </option>
                    </select> <br><br>

                    <button type="button" class="btn-primary-inverse" onclick="validateSpecialistChange()"> Save changes </button>

                    <div class="recommended-specialist-table container-hide scrolltable-x">
                        <br>
                        <!-- Recommend specialist table -->
                        <table class="normal-table">
                                <th>  </th> <!-- this columns is for the checkbox so the user is able to select any solution that could have helped them -->
                                <th> Specialist </th>
                                <th> Name </th>
                                <th> Location </th>
                                <th> Workload </th>
                                <th> Skills </th>
                        </table>
                    </div>


                    <hr>
                </div>

                @if( $problemlog->trackers->count() > 0)
                    <br>
                    <button type="button" class="btn-secondary" id="specialist-record-btn" onclick="displaySpecialistRecords()"> View Pervious Specialist </button>

                    <div id="specialist-record-container" class="scrolltable-x container-hide ">

                        <table class="normal-table">
                            <tr>
                                <th> Specialist ID </th>
                                <th> Specialist Name </th>
                                <th> Date Assigned </th>
                                <th> Reason </th>
                            </tr>

                            @foreach($problemlog->trackers as $specialistAssigned)

                                <tr>
                                    <td> {{ $specialistAssigned->employee_id }} </td>
                                    <td> {{ $specialistAssigned->specialist->forename . ' ' .  $specialistAssigned->specialist->surname  }} </td>
                                    <td> {{ $specialistAssigned->created_at->format('d/m/Y g:ia') }} </td>
                                    <td> {{ $specialistAssigned->reason }} </td>
                                </tr>

                            @endforeach

                        </table>
                    </div>
                @endif

            </div>
            <hr>

            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading"> Importance level </h3>
                </div>

                <div class="input-group-content">
                    <select name="importance_level" id="importance-level-input" class="select-default" >
                        <option value="Low" {{ $problemlog->importance == "Low" ? 'selected' : '' }}> Low </option>
                        <option value="Medium" {{ $problemlog->importance == "Medium" ? 'selected' : '' }}> Medium </option>
                        <option value="High"{{ $problemlog->importance == "High" ? 'selected' : '' }}> High </option>
                    </select>
                </div>


            </div>
            <!-- Submit button for form -->
            <button id="query-submit-btn" class="btn-primary" type="submit" name="submit"> Submit  &#8594; </button>

        </form>
    </div>

    <script src="{{ asset('js/client/register.js')}}"></script>
    <script src="{{ asset('js/client/viewOverview.js')}}"></script>

@endsection
