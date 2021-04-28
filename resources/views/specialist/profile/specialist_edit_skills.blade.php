@extends('base')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection


@section('content')
    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container sidebar-page-container">
        @include('specialist.profile.specialist_profile_nav_template')

        <div class="content-container">
            <!-- Write code here   -->
            <h3 class="section-heading"> Edit Skills </h3>
            <hr>

            <!-- Search by filter -->





            <div id="skills-record-table">
                <!-- Displaying all the skills assigned to the specialist -->
                <div class="scrolltable-x">
                    <!-- The scorlltable-x is used if the table is to big for a given display to be fit so it will add the
                            scroll feature so they view all the fields in the table  -->

                    <table class="normal-table" style="max-width:36rem">
                        <tr>
                            <th> Specialism </th>
                            <th style="width:10rem"> Action </th>
                        </tr>
                        @foreach($problems as $problem)
                            <tr>
                                <td> {{$problem->problem_type}} </td>
                                @if(!in_array($problem->id, $specialistSkills))
                                    <td>
                                        <form action="#" method="post">
                                        @csrf
                                            <!-- Add example -->
                                            <input type="hidden" name="specialism" value="Microsoft">
                                            <button name = submit type="submit" class="btn-text-mimic-blue" value = "add{{$problem->id}}"> + Add </button>
                                        </form>
                                    </td>
                                @endif
                                @if(in_array($problem->id, $specialistSkills))
                                    <td>
                                        <form action="#" method="post">
                                        @csrf
                                            <!-- Delete example -->
                                            <input type="hidden" name="specialism" value="Microsoft">
                                            <button name = submit type="submit" class="btn-text-mimic-red" value={{$problem->id}}> - Remove </button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- This section will handle pagination and the number of rows to show in a table -->
            <div class="table-property-container">
                <div class="pagination">
                    @if (!$problems->onFirstPage())
                        <a href="{{ $problems->previousPageUrl() }}"> &#x276E </a>
                    @endif
                    <span id="page-number">{{ $problems->currentPage() }}</span>
                    <span> / {{ $problems->lastPage() }}</span>
                    @if ($problems->hasMorePages())
                        <a href="{{ $problems->nextPageUrl() }}"> &#x276F </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
