@if($solutions->count())
    <div class="scrolltable-x">
        <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
            scroll feature so they view all the fields in the table  -->
        
        <div class="information-container" style="margin: 0.5rem 0rem 2rem 0rem;">
            <span> 🛈 </span>
            <div>
            <ol style="margin-left: 1rem;">
                <li> <p><b>Read the recommended solution below</b></p> </li>
                <li><p><b>Decide if the solution below has solved your problem.</b></p></li>
                <ul style="margin-left: 1rem;">
                    <li><small>If a solution works, mark the row as selected and click 'Submit </small></li>
                    <li> <small>If none of the recommended solution helps, then please select "Assign Specialist" from the toggle above</small> </li>
                </ul>
            </ol>
            </div>
        </div>
        @error('solution_desc')
            <div style = "color:red; font-size: small">
                {{ $message }}
            </div>
        @enderror


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
                    <td><input type="radio" name="solution_desc" class="solution-checkbox" value="{{$solution->solution}}"/></td>
                    <td>{{$solution->problemLog->title}}</td> <!-- Problem title -->
                    <td>{{$solution->solution}}</td> <!-- Solution description -->
                    <td>{{$solution->problemLog->problemType->problem_type}}</td> <!-- Problem category -->
                    <td>{{$solution->problemLog->solved_at}}</td><!-- Date solved/ Last edited? -->
                </tr>
            @endforeach
        </table>
        <br>
    </div>
@else

    {{-- Add anything you want to display for when there are no solutions here --}}
    <div class="information-container">
        <span> 🛈 </span>
        <div>
            <b> Assign a specialist for this problem. </b>
            <p> There are no solutions that we can suggest to try, please select specialist. </p>
        </div>
    </div>
    <br>

@endif


<!-- Submit button for form -->
<hr>
<button id="query-submit-btn" class="btn-primary" type="submit" name="submitSol" value = "sol"> Submit  &#8594; </button>
