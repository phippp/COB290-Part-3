<div class="scrolltable-x">
    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
        scroll feature so they view all the fields in the table  -->
    <input style="display: none" readonly type="number" name="hidden-page" id="hidden-page" value="{{ $problemlogs->currentPage() }}">
    
    @if(@count($problemlogs) == 0)
        <div class="single-error-container">
            <span> &#10006 </span>
            <div id="call-reason-error-msg">
                <b> No results found </b>
                <p> <a href="#" onclick="clearForm()"> Click here </a> to reset the filter applied </p>
            </div>
        </div>

    @else

    <table class="normal-table hover-cursor-on-table">
        <tr>
            <th> Date </th>
            <th> Problem ID </th>
            <th style="width:30%"> Title</th>
            <th> Category </th>
            <th> Status </th>
            <th> Importance </th>
        </tr>
    @foreach ($problemlogs as $problemlog)
        @if ($problemlog->status == 'Verify')
            <?php $a = route('client_verify_solution', $problemlog); ?>
        @else
            <?php $a = route('client_problem_view', $problemlog); ?>
        @endif
        <tr onclick= "window.location.href='<?=$a?>' " >
            <td> {{ $problemlog->created_at->format('d/m/Y') }}</td>
            <td> {{ $problemlog->id }} </td>
            <td> {{ $problemlog->title}} </td>
            <td> {{ $problemlog->problemType->problem_type }} </td>
            <td class="problem-status-@if($problemlog->status != 'In queue'){{strtolower($problemlog->status)}}@endif">
                {{ $problemlog->status }}
            </td>
            <td class="importance-{{strtolower($problemlog->importance)}}"> {{ $problemlog->importance }} </td>
        </tr>
    @endforeach
    </table>
    @endif
</div>

<!-- This section will handle pagination and the number of rows to show in a table -->
<div class="table-property-container">
    <div class="pagination">
        @if (!$problemlogs->onFirstPage())
            <a onclick="changePage(-1)"> &#x276E </a>
        @endif
        <span id="page-number">{{ $problemlogs->currentPage() }}</span>
        <span> / {{ $problemlogs->lastPage() }}</span>
        @if ($problemlogs->hasMorePages())
            <a onclick="changePage(1)"> &#x276F </a>
        @endif
    </div>
</div>
