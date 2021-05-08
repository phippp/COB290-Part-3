<!--
    NK: I tried to render some backend but had issues, here is the TODO List

    TODO:
    Render the following backend information
    1. Software, hardware - DONE
    2. Title and description - DONE
    3. General Category and specific category - DONE
    4. Solution section - DONE
    5. Specialist details (if specialist assigned) - DONE
    6. Call records (if there is any recorded) - DONE

    PN: I have been doing the above task but have a TODO list for frontend

    TODO:
    1. Style div for 'There are no comments yet'
    2. Style div when there are no call records
 -->

@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css') }}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client.client_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="heading-flex-end">
            <h2 class="page-title"> Overview </h2>
            <a href="{{route('client_problem_edit',$problemlog)}}" id="edit-overview-btn">
                &#x270E; Edit
            </a>
        </div>
        <hr class="page-title-hr">


        <!-- ########################################################################### -->
        <!-- Displaying id, date and status of the problem -->
        <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->
            <!-- NOTE FOR THE BACKEND:  -->
            @if($problemlog->status === "Solved")
                <!-- Display this section if the problem is marked as solved -->
                <div class="success-container" >
                    <span> &#x1F6C8 </span>
                    <div>
                        This problem has been marked as <b> SOLVED </b>
                    </div>
                </div> <br>
            @endif



            <div id="problem-id-info">
                <h2> Problem ID : {{ $problemlog->id }} </h2>
                <h4> Issued : {{$problemlog->created_at->format('d/m/Y g:ia')}} </h4>
                <!-- BACKEND: Only show a solved date here if the problem is marked as solved -->
                @if($problemlog->status === "Solved") <h4> Solved : {{$problemlog->solved_at->format('d/m/Y g:ia')}} </h4> @endif
                <br>
            </div>

            <div class="problem-status ">
                <div id="problem-status-title"> Problem Status </div>
                <input type="text" name="query-status" class="small-text-input" value="{{ $problemlog->status }}" readonly >
            </div>
        </div>


        <hr>

        <!-- ########################################################################### -->
        <!-- Hardware and Software section -->
        <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->

            <div class="input-group-header">
                <h3 class="section-heading">  Equipment details </h3>
            </div>

            <div class="input-group-content">
                    <div class="flex-input-container">
                    @if($problemlog->operating_system_id != null )
                        <!-- Operating system input -->
                        <div id="select-os">
                            <label for="operating-system" class="label-default">Operating system</label> <br>
                            <input type="text" name="operating-system" id="os-system" class="small-text-input" value="{{ $problemlog->operatingSystem->operating_system_name }}" readonly>
                        </div>
                    @endif

                    @if($problemlog->software_id != null)
                        <!-- Application software input -->
                        <div id="select-app-software">
                            <label for="app-software" class="label-default">Application Software</label> <br>
                            <input type="text" name="app-software" id="app-software" class="small-text-input" value="{{ $problemlog->software->name }} {{ $problemlog->software->version }}" readonly >
                        </div>
                    @endif

                    </div>

                @if($problemlog->hardware_id != null)
                    <div id="hardware-section">
                        <table class="normal-table " id="hardware-table-summary">
                            <tr>
                                <th class="label-default"> Serial number </th>
                                <td> {{ $problemlog->hardware->serial_num }} </td>
                            </tr>
                            <tr>
                                <th class="label-default"> Name </th>
                                <td> {{ $problemlog->hardware->name }} </td>
                            </tr>
                            <tr>
                                <th class="label-default"> Type </th>
                                <td> {{ $problemlog->hardware->type }} </td>
                            </tr>
                            <tr>
                                <th class="label-default"> Make </th>
                                <td> {{ $problemlog->hardware->make }} </td>
                            </tr>

                        </table>
                        
                        
                        
                        
                    </div>
                @endif

            </div>

        </div>

        <!-- ########################################################################### -->
        <!-- Problem categorization section -->
        <div class="input-group-container">
            <div class="input-group-header">
                <h3 class="section-heading">  Category   </h3>
            </div>

            <div class="input-group-content">

                @if($problemlog->problemType->parentProblem != null)
                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">
                            <label for="generic-category" class="label-default"> General category </label> <br>
                            <input type="text" name="generic-category" id="generic-category" class="small-text-input" value="{{ $problemlog->problemType->parentProblem->problem_type }}" readonly >

                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific-category" class="label-default"> Specific category</label> <br>
                            <input type="text" name="specific-category" id="specific-category" class="small-text-input" value="{{ $problemlog->problemType->problem_type }}" readonly>

                        </div>
                    </div>

                @else

                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">
                            <label for="generic-category" class="label-default"> General category </label> <br>
                            <input type="text" name="generic-category" id="generic-category" class="small-text-input" value="{{ $problemlog->problemType->problem_type }}" readonly >

                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific-category" class="label-default"> Specific category</label> <br>
                            <input type="text" name="specific-category" id="specific-category" class="small-text-input" value="N/A" readonly>

                        </div>
                    </div>
                @endif

                
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
                <label for="title" class="label-default"> Title </label> <br>
                <input type="text" name="title" id="query-title-input"class="small-text-input" value="{{ $problemlog->title }}" readonly> <br>
                <br>

                <!-- Input field for Description -->
                <label for="description" class="label-default">Description </label> <br>
                <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                <textarea name="description" id="query-description-input" class="large-text-input" readonly>{{ $problemlog->description }}</textarea>

                <!-- Only render the stuff below if description/solution has been modified from their initial input -->
                <!-- View history of description and solution btn  -->

                @if($problemlog->notes->count())

                    <button type="button" class="btn-secondary" id="pervious-record-history-btn"  onclick="displayPerviousRecords()"> &#x276E View History ({{$problemlog->notes->count()}}) </button>

                    <div class="pervious-info-container container-hide" id="pervious-history-container"> <!-- This is container which will show all the pervious description and solution -->

                        @foreach($problemlog->notes as $note)

                            <div class="solution-description-msg"> <!-- This hold information about single change in description and solution -->
                                <h4 id="modified-info"> Last edited @ {{ $note->created_at }} by Team 9 (ID:9)</h4>
                                <h4 id="pervious-description-title"> Description </h4>
                                <textarea readonly class="pervious-description"> {{ $note->description }} </textarea>
                                <h4 id="pervious-solution-title"> Solution </h4>
                                <textarea readonly class="pervious-solution"> {{ $note->solution}} </textarea>
                            </div> <hr>

                        @endforeach

                    </div>

                @endif
            </div>

        </div>
    


        <!-- ########################################################################### -->
        <!-- Solution section -->
        <div class="input-group-container">
            <div class="input-group-header">
                <h3 class="section-heading">  Solution  </h3>
            </div>

            <div class="input-group-content">
                @foreach($problemlog->notes->reverse() as $note)

                    @if($note->solution != null)
                        <!-- BACKEND: show this div if the problem has been assigned to a specialist and no solution is provided  -->
                        <textarea name="solution" class="large-text-input" readonly> {{ $note->solution }} </textarea>
                        <?php $solution = true; ?>
                        @break
                    @endif

                @endforeach

                @if(empty($solution))
                    <div class="information-container" >
                        <span> &#x1F6C8 </span>
                        <div>
                            <b>Please wait for a specialist to provide a solution to this problem </b>
                        </div>
                    </div>
                @endif
            </div>

        </div>


        <!-- ########################################################################### -->
        <!-- Specialist info -->
        <div class="input-group-container">
            <div class="input-group-header">
                <h3 class="section-heading">  Specialist Details  </h3>
            </div>

            <div class="input-group-content">
                @if($problemlog->specialist_assigned)
                    @php($last = $problemlog->trackers->last())
                    <!-- Backend show this section if the problem has a specialist assigned to it  -->
                    <div id="emp-info-parent">
                        <div class="emp-info-child">
                            <table id="emp-generic-detail">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td> {{ $last->specialist->id }} </td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td> {{ $last->specialist->forename }} {{ $last->specialist->surname }} </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td> {{ $last->specialist->email_address }} </td>
                                    </tr>
                                    <tr>
                                        <th>Department</th> <!-- could remove this data row if you wish to -->
                                        <td> {{ $last->specialist->job->type }} </td>
                                    </tr>
                                    <tr>
                                        <th>Job Title</th>
                                        <td> {{ $last->specialist->job->title }} </td>
                                    </tr>
                                    <tr>
                                        <th>Telephone</th>
                                        <td> {{ $last->specialist->branch->phone_number_base }} ext {{ $last->specialist->phone_number_extension }} </td>
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
                                            {{ $last->specialist->branch->address_line_1 }} <br>
                                            {{ $last->specialist->branch->address_line_2 }} <br>
                                            {{ $last->specialist->branch->city }} <br>
                                            {{ $last->specialist->branch->postcode }}  <br>
                                            {{ $last->specialist->branch->country }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                @else

                    <!-- Show this section if there is no specialist assigned to this problem  -->
                    <div class="information-container" >
                        <span> &#x1F6C8 </span>
                        <div>
                            <b> No specialist was assigned to this problem</b>
                            <p> This could be because the solution to this problem was already found without the need of an specialist</p>
                        </div>
                    </div>

                @endif
            </div>
        </div>
        <hr>

        <div class="input-group-container">
            <div class="input-group-header">
                <h3 class="section-heading"> Importance Level </h3>
            </div>

            <div class="input-group-content">
                <input type="text" class="small-text-input" value="{{ $problemlog->importance }}" readonly >
            </div>
        </div>

        @if($problemlog->calls->count())

            <div class="input-group-holder">
                <h3 class="section-heading"> Call Records </h3>
                <button type="button" class="btn-secondary" id="call-record-btn" onclick="callRecords()">&#x2706 View Call Records ({{$problemlog->calls->count()}})</button>
                <div id="call-record-table" class="scrolltable-x container-hide">


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
            </div>

        @endif

    </div>



    <script src="{{ asset('js/client/viewOverview.js') }}"></script>

@endsection
