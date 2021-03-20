@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client_navigation')

    <!-- Page content -->
    <div class="page-container">
        <h2 class="page-title"> Register </h2>
        <hr class="page-title-hr">



        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="#" method="post">

            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <h3 class="section-heading">  Enter the appropriate equipment details <span class="required-field">*</span>  </h3>
        
            <!-- Asking the user for their input on software and hardware so we can check if they are licensed or not -->
            <div id="equip-check-section">

                <div class="software-section">
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

                <h4 class="italic-light"><em> Either </em></h4>

                <!-- Hardware input section -->
                <div id="hardware-section">
                    <label for="serial-num" class="label-default">Serial Number</label> <br>
                    <input type="text" name="serial-num" id="hardware-input" class="input-default">
                </div>
            </div>
            <br> <hr>
            
            <!-- ########################################################################### -->
            <!-- Problem Title and description section -->
            <h3 class="section-heading" class="label-default">  Notes   </h3>            
           
            <!-- Input field for title -->
            <label for="title" class="label-default"> Title <span class="required-field">*</span> </label> <br>
            <input type="text" name="title" id="query-title-input"class="input-default" > <br>
            

            <!-- Input field for Description -->
            <label for="description" class="label-default">Description <span class="required-field">*</span></label> <br>
            <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
            <textarea name="description" id="query-description-input" class="large-text-input"></textarea>
            <br> <hr>


            <!-- ########################################################################### -->
            <!-- Problem categorization section -->         
            <div id="categorization-section">
                <h3 class="section-heading">  Category   </h3>            
                <div id="category-input-section">
                    <!-- Input section -->
                    <div id="generic-categorization-container">  <!-- this div is CSS flex child   -->
                        <label for="generic-category" class="label-default">General category <span class="required-field">*</span> </label> <br>
                        <select name="generic-category" id="generic-category" class="select-default">
                            <option selected> - </option>
                        </select>
                    </div>

                    <div id="specific-categorization-container">
                        <label for="specific-category" class="label-default"> Specific category</label> <br>
                        <select name="specific-category" id="specific-category" class="select-default">
                        <option selected> - </option>
                        </select>
                    </div>
                </div>

                <button type="button" id="reset-category-list" class="secondary-btn"> &#x27F3 Reset options </button>
                <!-- NOT SURE: having a button which will display all the generic category -->
            </div>
            <hr>



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
        
                        <tr>
        
                            <td><input type="checkbox" name="name1"  class="solution-checkbox"/></td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                        </tr>
                        <tr>
                            <td> <input type="checkbox" name="name1" class="solution-checkbox"/></td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                            <td> Lorem ipsum dolor sit amet. </td>
                        </tr>
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