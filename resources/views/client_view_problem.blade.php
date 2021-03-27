<!-- 
    NK: I tried to render some backend but had issues, here is the TODO List

    TODO: 
    Render the following backend information
    1. Software, hardware
    2. Title and description 
    3. General Category and specific category
    4. Solution section 
    5. Specialist details (if specialist assigned)
    6. Call records (if there is any recorded)
 -->

@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css') }}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->
        
        <div class="heading-flex-end">
            <h2 class="page-title"> Overview </h2>
            <a href="#" id="edit-overview-btn">
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
                <div class="information-container" >
                    <span> &#x1F6C8 </span>
                    <div>
                        This problem has been marked as <b> SOLVED </b> by Specialist Name (ID) 
                    </div>
                </div> <br>
            @endif 



            <div id="problem-id-info">
                <h2> Problem ID : {{ $problemlog->id }} </h2>
                <h4> Issued : 26/11/2000 11:30pm </h4>
                <!-- BACKEND: Only show a solved date here if the problem is marked as solved -->
                @if($problemlog->status === "Solved") <h4> Solved : 26/11/2021 11:22pm </h4> @endif
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
        <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same -- making it look symmetrical -->

            <h3 class="section-heading">  Equipment details </h3>

            <div class="flex-input-container">
                <!-- Operating system input -->
                <div id="select-os">
                    <label for="operating-system" class="label-default">Operating system</label> <br>
                    <input type="text" name="operating-system" id="os-system" class="small-text-input" value="Window 10" readonly>
                </div>
                    
                <!-- Application software input -->
                <div id="select-app-software">
                    <label for="app-software" class="label-default">Application Software</label> <br>
                    <input type="text" name="app-software" id="app-software" class="small-text-input" value="AutoCad" readonly >                     
                </div>
                
                <!-- Hardware input section -->
                <div id="hardware-section">
                    <label for="serial-num" class="label-default">Serial Number</label> <br>
                    <input type="text" name="serial-num" id="hardware-input" class="small-text-input" value=" Serial num here if provided" readonly>
                </div>

            </div>
        </div>            
        <hr>
        
        
        
        
        <!-- ########################################################################### -->
        <!-- Problem Title and description section -->
        <div class="input-group-holder">
            <h3 class="section-heading" class="label-default">  Notes   </h3>            
        
            <!-- Input field for title -->
            <label for="title" class="label-default"> Title </label> <br>
            <input type="text" name="title" id="query-title-input"class="small-text-input" value="{{ $problemlog->title }}" readonly> <br>
            

            <!-- Input field for Description -->
            <label for="description" class="label-default">Description </label> <br>
            <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
            <textarea name="description" id="query-description-input" class="large-text-input" readonly></textarea>

            <!-- Only render the stuff below if description/solution has been modified from their initial input -->
            <!-- View history of description and solution btn  -->
            <button type="button" class="secondary-btn" id="pervious-record-history-btn"  onclick="displayPerviousRecords()"> &#x276E View History (1) </button>
            
            <div class="pervious-info-container container-hide" id="pervious-history-container"> <!-- This is container which will show all the pervious description and solution -->
                
                <div class="solution-description-msg"> <!-- This hold information about single change in description and solution --> 
                    <h4 id="modified-info"> Last edited @  26/11/2000 11:30pm  by Team 9 (ID:9)</h4>
                    <h4 id="pervious-description-title"> Description </h4>
                    <textarea readonly class="pervious-description"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, illo?</textarea>
                    <h4 id="pervious-solution-title"> Solution </h4>
                    <textarea readonly class="pervious-solution"> Lorem ipsum dolor sit amet. </textarea>
                </div> <hr>

                <div class="solution-description-msg"> <!-- This hold information about single change in description and solution --> 
                    <h4 id="modified-info"> Last edited @  26/11/2000 11:30pm  by Team 9 (ID:9)</h4>
                    <h4 id="pervious-description-title"> Description </h4>
                    <textarea readonly class="pervious-description"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsam, illo?</textarea>
                    <h4 id="pervious-solution-title"> Solution </h4>
                    <textarea readonly class="pervious-solution"> Lorem ipsum dolor sit amet. </textarea>
                </div> <hr>
            </div>



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
                    <input type="text" name="generic-category" id="generic-category" class="small-text-input" readonly >

                </div>

                <div id="specific-categorization-container">
                    <label for="specific-category" class="label-default"> Specific category</label> <br>
                    <input type="text" name="specific-category" id="specific-category" class="small-text-input" readonly>

                </div>
            </div>

        </div>   
        <hr>


        <!-- ########################################################################### -->
        <!-- Solution section -->   
        <div class="input-group-holder">
            <h3 class="section-heading">  Solution  </h3>

            <!-- BACKEND: show this div if the problem has been assigned to a specialist and no solution is provided  -->
            <div class="information-container" >
                <span> &#x1F6C8 </span>
                <div>
                    <b>Please wait for a specialist to provide a solution to this problem </b>
                </div>
            </div>

            <!-- BACKEND: show this div if the problem has been provided with a solution -->
            <textarea name="solution" class="large-text-input" readonly> Show this textarea if a solution has been provided by the user</textarea>
        </div>
        <hr>

        <!-- ########################################################################### -->
        <!-- Specialist info -->   
        <div class="input-group-holder">
            <!-- Backend show this section if the problem has a specialist assigned to it  -->
            <h3 class="section-heading">  Specialist Details  </h3>
            <div id="emp-info-parent">
                <div class="emp-info-child">
                    <table id="emp-generic-detail">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td> 9 </td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td> Specialist Name </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td> specialist@lboro.com </td>
                            </tr>
                            <tr>
                                <th>Department</th> <!-- could remove this data row if you wish to -->
                                <td> Specialist </td>
                            </tr>
                            <tr>
                                <th>Job Title</th>
                                <td> Senior Specialist </td>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <td> 012334599234 ext 45454 </td>
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
                                    Loughborough University <br>
                                    Epinal Way <br>
                                    Loughborough <br>
                                    Leicestershire <br>
                                    LE11 3TU  <br>
                                    United Kingdom
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>


            <!-- Show this section if there is no specialist assigned to this problem  -->
            <div class="information-container" >
                <span> &#x1F6C8 </span>
                <div>
                    <b> No specialist was assigned to this problem</b>
                    <p> This could be because the solution to this problem was already found without the need of an specialist</p>
                </div>
            </div>
        </div>
        <hr>

        <div class="input-group-holder">
            <h3 class="section-heading"> Importance Level </h3>
            <input type="text" class="small-text-input" value="{{ $problemlog->importance }}" readonly >
            <br> <br>
        </div>

        <div class="input-group-holder">
            <h3 class="section-heading"> Call Records </h3>
            <button type="button" class="secondary-btn" id="call-record-btn" onclick="callRecords()">&#x2706 View Call Records (1)</button>
            <div id="call-record-table" class="scrolltable-x container-hide">
                <table class="normal-table">
                    <tr>
                        <th> Call Time </th>
                        <th> Received By </th>
                        <th id="call-record-description"> Record </th>
                    </tr>

                    <tr>
                        <td> 25/11/200 11:30pm </td>
                        <td> Lorem isp </td>
                        <td> Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, omnis quisquam? In pariatur et aperiam laborum obcaecati nihil delectus a cupiditate, corporis ipsum iusto sit corrupti maxime expedita temporibus odio. </td>
                    </tr>
                </table>
            </div>
        </div>

    </div>



    <script src="{{ asset('js/client/viewOverview.js') }}"></script>

@endsection
