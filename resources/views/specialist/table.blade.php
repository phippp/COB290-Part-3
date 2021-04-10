<div class="scrolltable-x">

    <input style="display: none" readonly name="hidden-page" id="hidden-page" value="{{ $problemlogs->currentPage() }}">
    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
        scroll feature so they view all the fields in the table  -->

    <table class="normal-table hover-cursor-on-table">
        <tr>
            <th> Date </th>
            <th> Problem ID </th>
            <th style="width:30%"> Problem Title</th>
            <th> Category </th>
            <th> Status </th>
            <th> Importance </th>
        </tr>
        @foreach ($problemlogs as $problemlog)
        <?php $a = route('log_overview', $problemlog); ?>
        <tr onclick= "window.location.href='<?=$a?>' " >
            <td> {{ $problemlog->created_at->format('d/m/Y') }}</td>
            <td> {{ $problemlog->id }} </td>
            <td> {{ $problemlog->title}} </td>
            <td> {{ $problemlog->problemType->problem_type }} </td>
            <td> {{ $problemlog->status }} </td>
            <td> {{ $problemlog->importance }} </td>
        </tr>
    @endforeach
    </table>
</div>

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
