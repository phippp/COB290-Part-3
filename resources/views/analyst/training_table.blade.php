<input style="display: none" readonly type="number" name="hidden-page" @if($time) id="specialist-page" @else id="client-page" @endif value="{{ $problems->currentPage() }}">

<table class="normal-table">
    <tr>
        <th style="width:25%;"> Cases Reported </th>
        @if($time)
            <th style="width:25%;"> Time spent </th>
        @endif
        <th> Category </th>
    </tr>
    @foreach($problems as $problem)
        <tr>
            <td> {{ $problem->problem_logs_count}} </td>
            @if($time)
                @php($hours = 0)
                @foreach($problem->problemLogs as $log)
                    @if($log->solved_at != null)
                        @php($hours += $log->created_at->diffInHours($log->solved_at))
                    @else
                        @php($hours += $log->created_at->diffInHours(\Carbon\Carbon::now()))
                    @endif
                @endforeach
                <td> {{ number_format($hours / $problem->problem_logs_count,0) }} hour(s) </td>
            @endif
            <td> {{ $problem->problem_type }} </td>
        </tr>
    @endforeach
</table>

<div class="table-property-container">
    <div class="pagination">
        @if (!$problems->onFirstPage())
            <a onclick="changePage(-1,@if($time)'specialist'@else'client'@endif)"> &#x276E </a>
        @endif
        <span id="page-number">{{ $problems->currentPage() }}</span>
        <span> / {{ $problems->lastPage() }}</span>
        @if ($problems->hasMorePages())
            <a onclick="changePage(1,@if($time)'specialist'@else'client'@endif)"> &#x276F </a>
        @endif
    </div>
</div>
