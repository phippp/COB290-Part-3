@extends('base')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
@endsection


@section('content')
    <!-- Inserting the navigation on our page -->
    @include('specialist.specialist_navigation')

    <div class="page-container flex">
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
                        <tr>
                            <td> Microsoft </td>
                            <td>
                                <form action="">
                                    <!-- Add eample -->
                                    <input type="hidden" name="specialism" value="Microsoft">
                                    <button type="submit" class="btn-text-mimic-blue"> + Add </button>
                                </form>
                            </td>
                        </tr>
                        <tr> 
                            <td> Networking </td>
                            <td>
                                <form action=""> 
                                    <!-- Delete example -->
                                    <input type="hidden" name="specialism" value="Microsoft">
                                    <button type="submit" class="btn-text-mimic-red"> - Remove </button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td> SketchUp </td>
                            <td>
                                <form action="">
                                    <!-- Add eample -->
                                    <input type="hidden" name="specialism" value="Microsoft">
                                    <button type="submit" class="btn-text-mimic-blue"> + Add </button>
                                </form>                                
                            </td>
                        </tr>
                        <tr>
                            <td> AutoCAD </td>
                            <td>
                                <form action="">
                                    <!-- Add eample -->
                                    <input type="hidden" name="specialism" value="Microsoft">
                                    <button type="submit" class="btn-text-mimic-blue"> + Add </button>
                                </form>                                
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            

        </div>

    </div>

@endsection