@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css') }}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="heading-flex-end">
            <h2 class="page-title"> Overview </h2>
            <a id="edit-overview-btn">
                &#x270E; Edit
            </a>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Department</th> <!-- could remove this data row if you wish to -->
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Job Title</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td></td>
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
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <hr>


            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->

                <h3 class="section-heading">  Equipment Check </h3>

                <div class="flex-input-container">
                    <!-- Operating system input -->
                    <div id="select-os">
                        <label for="operating-system" class="label-default">Operating system</label> <br>
                        <input type="text" name="operating-system" id="os-system" class="small-text-input">
                    </div>

                    <!-- Application software input -->
                    <div id="select-app-software">
                        <label for="app-software" class="label-default">Application Software</label> <br>
                        <input type="text" name="app-software" id="app-software" class="small-text-input">
                    </div>

                    <!-- Hardware input section -->
                    <div id="hardware-section">
                        <label for="serial-num" class="label-default">Serial Number</label> <br>
                        <input type="text" name="serial-num" id="hardware-input" class="small-text-input">
                    </div>

                </div>
            </div>

            <hr>

            <!-- ########################################################################### -->
            <!-- Problem Title and description section -->
            <div class="input-group-holder">
                <h3 class="section-heading" class="label-default"> Notes </h3>

                <!-- Input field for title -->
                <label for="title" class="label-default"> Title </label><br>
                <input type="text" name="title" id="query-title-input"class="small-text-input"><br>


                <!-- Input field for Description -->
                <label for="description" class="label-default">Description </label> <br>
                <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                <textarea name="description" id="query-description-input" class="large-text-input"></textarea>

                <button type="button" class="prev-call-btn" id="log-overview-btn" onclick=""> View Previous History </button>
            </div>

            <hr>

            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-holder">
                <h3 class="section-heading">  Category   </h3>

                <div class="flex-input-container">
                    <!-- Input section -->
                    <div id="generic-categorization-container">
                        <label for="generic-category" class="label-default"> General category </label> <br>
                        <input type="text" name="generic-category" id="generic-category" class="small-text-input">

                    </div>

                    <div id="specific-categorization-container">
                        <label for="specific-category" class="label-default"> Specific category</label> <br>
                        <input type="text" name="specific-category" id="specific-category" class="small-text-input">

                    </div>
                </div>
            </div>

            <!-- ########################################################################### -->
            <!-- Solution section -->
            <div class="input-group-holder">
                <h3 class="section-heading">  Solution  </h3>

                <div class="information-container" >
                    <span> &#x1F6C8 </span>
                    <div>
                        <b><strong>No solution has been provided by the specialist</strong></b><br>
                        <b>Please wait for a specialist to provide a solution to this problem </b>
                    </div>
                </div>
            </div>

            <hr>

            <!-- ########################################################################### -->
            <!-- Specialist Details section -->
            <div class="input-group-holder">
                <h3 class="section-heading">  Specialist Details  </h3>

                <div id="emp-info-parent">
                    <div class="emp-info-child">
                        <table id="emp-generic-detail">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>  </td>
                                </tr>
                                <tr>
                                    <th>Department</th> <!-- could remove this data row if you wish to -->
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Job Title</th>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td>  </td>
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
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <button type="button" class="secondary-btn" id="prev-specialist"> View Specialist Record </button>
                <br><br>
                <h3 class="section-heading"> Importance Level </h3>
                <input type="text" class="small-text-input">
                <br>
            </div>

            
            <hr>

            <!-- ########################################################################### -->
            <!-- Call Log section -->
            <div class="input-group-holder">
                @if($problemlog->calls->count())
                    <h3 class="section-heading"> Call Records </h3>
                    <button type="button" class="secondary-btn" id="prev-call-records" onclick="callRecords()">&#x2706 View Previous Call Records ({{$problemlog->calls->count()}})</button>
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
                @endif
            </div>

        </form>
        <button type="button" class="primary-form-button" id="Submit"> Submit </button>


    </div>

    <script src="{{ asset('js/client/viewOverview.js') }}"></script>
@endsection