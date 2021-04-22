@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            background-color: #F4F5F7;
        }
    </style>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="heading-flex-end">
                <h2 class="page-title"> Device View </h2>
        </div>
        <hr class="page-title-hr">

        <div class="search-section">
            <div id="search-by-form">
                <label for="type">Search By:</label>
                <select name="type" id="search-type">
                    <option value="specialistID">Specialist ID</option>
                    <option value="name">Name</option>
                    <option value="branch">Branch ID</option>
                    <option value="city">City / Country</option>
                </select>
                <input type="text" name="" id="search-input">
                <button onclick="getAjax()"> <img src="{{ asset('images/search_icon.svg') }}" alt="Search" srcset=""> </button>
            </div>
        </div>

        <div id="table-content">
            <!-- Displaying all the records they have registered in the system -->
            <div class="scrolltable-x">

                <input style="display: none" readonly type="number" name="hidden-page" id="hidden-page" value="{{ $specialists->currentPage() }}">
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
                            <a href="{{ $specialists->previousPageUrl() }}"> &#x276E </a>
                        @endif
                        <span id="page-number">{{ $specialists->currentPage() }}</span>
                        <span> / {{ $specialists->lastPage() }}</span>
                        @if ($specialists->hasMorePages())
                            <a href="{{ $specialists->nextPageUrl() }}"> &#x276F </a>
                        @endif
                    </div>
                </div>
        </div>
    </div>

    <script type="text/javascript">
        function getAjax(){

            var page = ($( "#hidden-page" ).val() != null)? $( "#hidden-page" ).val() : 1;

            $.ajax({
                url: '{{ route('specialist_info_table') }}?page='+ page,
                type: 'POST',
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                datatype : "json",
                data: {
                    user_id : {{ auth()->user()->employee->id }},
                    search : {
                        field : $( "#search-type" ).val(),
                        value : $( "#search-input" ).val()
                    }
                },
                success: function(response){
                    var data = response['request'];
                    console.log(data);
                    $( "#table-content" ).html(response['html']);
                }
            })
        }

        $(document).ready(getAjax());

        function changePage(x){
            var num = parseInt($.trim($( "#hidden-page" ).val()))
            $( "#hidden-page" ).val(num += x);
            getAjax();
        }
    </script>

@endsection