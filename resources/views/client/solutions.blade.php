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
                <td>{{$solution->problemLog->title}}</td> <!-- Problem title? -->
                <td>{{$solution->solution}}</td> <!-- Solution description -->
                <td>{{$solution->problemLog->problemType->problem_type}}</td> <!-- Problem category -->
                <td>{{$solution->problemLog->solved_at}}</td><!-- Date solved/ Last edited? -->
            </tr>
        @endforeach
    </table>

</div>
<!-- Submit button for form -->
<button id="query-submit-btn" class="btn-primary" type="submit" name="submitSol" value = "sol"> Submit  &#8594; </button>
