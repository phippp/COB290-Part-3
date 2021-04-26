<div class="scrolltable-x">

    <input style="display: none" name="hidden-page" id="hidden-page" value="{{ $problemlogs->currentPage() }}">
    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
        scroll feature so they view all the fields in the table  -->

    <table class="normal-table hover-cursor-on-table">
        <tr>
            <th> Date </th>
            <th> Problem ID </th>
            <th> Problem Title </th>
            <th> Category </th>
            <th> Status</th>
            <th> Importance </th>
            <th> Assigned To </th>
        </tr>
        @foreach($problemlogs as $problem)
            <tr>
                <td> {{ $problem->created_at->format('d/m/Y') }} </td>
                <td> {{ $problem->id }} </td>
                <td> {{ $problem->title }}</td>
                <td> {{ $problem->problemType->problem_type }} </td>
                <td> {{ $problem->status }} </td>
                <td> {{ $problem->importance }} </td>
                <td> {{ $problem->currentSpecialist() }}</td>
            </tr>
        @endforeach
    </table>
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
