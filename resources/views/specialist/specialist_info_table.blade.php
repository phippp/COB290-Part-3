<div class="scrolltable-x">

    <input style="display: none" readonly name="hidden-page" id="hidden-page" value="{{ $specialists->currentPage() }}">
    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
        scroll feature so they view all the fields in the table  -->

    <table class="normal-table hover-cursor-on-table">
        <tr>
            <th> Specialist ID </th>
            <th> Name </th>
            <th> Tasks Assigned </th>
            <th> Branch ID </th>
            <th> City / Country </th>
        </tr>
        @foreach ($specialists as $specialist)
        <tr>
            <td>{{ $specialist->id }}</td>
            <td>{{ $specialist->forename }} {{ $specialist->surname }}</td>
            <td>{{ $specialist->count }}</td>
            <td>{{ $specialist->branch_id }}</td>
            <td>{{ $specialist->city }}, {{ $specialist->country }}</td>
        </tr>
    @endforeach
    </table>
</div>

<div class="table-property-container">
    <div class="pagination">
        @if (!$specialists->onFirstPage())
            <a onclick="changePage(-1)"> &#x276E </a>
        @endif
        <span id="page-number">{{ $specialists->currentPage() }}</span>
        <span> / {{ $specialists->lastPage() }}</span>
        @if ($specialists->hasMorePages())
            <a onclick="changePage(1)"> &#x276F </a>
        @endif
    </div>
</div>
