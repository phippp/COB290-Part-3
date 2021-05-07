<!-- TODO:
    Show equipment option -> Application, OS, Serial Number
    Show pervious history just below the notes section (same from problem overview)
    If specialist has been assigned, then by default, specialist section should be selected

    Maybe:
    Based on the category selected, warn the user if the problem is frequently occurring.
 -->

@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css')}}">
    <script>
        // needed this data so we can automatically select & load generic and specific category.
        const genericCategory = @json($genericCategory, JSON_PRETTY_PRINT);
        const specificCategory = @json($specificCategory, JSON_PRETTY_PRINT);
        const organizedCategory = @json($organizedCategory, JSON_PRETTY_PRINT);
    </script>
@endsection

@section('content')

    <!-- Inserting the navigation on our page -->
    @include('client.client_navigation')

    <div class="page-container"> <!-- this class will center the content i.e align it horizontally and put max width-->

        <div class="heading-flex-end">
                <h2 class="page-title"> Edit Problem </h2>
        </div>
        <hr class="page-title-hr">


        <div class="input-group-holder"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
            <div id="problem-id-info">
                <h2> Problem ID : {{ $problemlog->id }} </h2>
                <h4> Issued : {{$problemlog->created_at->format('d/m/Y g:ia')}} </h4>
                <br>
            </div>

            <div class="problem-status ">
                <div id="problem-status-title"> Problem Status </div>
                <input type="text" name="query-status" class="small-text-input" value="{{ $problemlog->status }}" readonly >
            </div>
        </div>

        <hr>

        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="#" method="post">
            @csrf

            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading"> Enter the appropriate equipment details. <span class="required-field">*</span>   </h3>
                </div>

                <div class="input-group-content">
                    <div class="flex-input-container">
                        <!-- Operating system input -->
                        <div id="select-os">
                            <label for="operating-system" class="label-default">Operating system</label> <br>
                            <select name="operating_system" id="os-system" class="select-default" >
                                <option selected value="-"> - </option>
                                @foreach($operatingSystems as $option)
                                    @if($option->id == $problemlog->operating_system_id)
                                        <option value = "{{$option->id}}" selected> {{$option->operating_system_name}} </option>
                                    @else
                                        <option value = "{{$option->id}}"> {{$option->operating_system_name}} </option>
                                    @endif
                                @endforeach
                            </select>


                            <!-- <input type="text" name="operating-system" id="os-system" class="small-text-input" placeholder="{{ ($problemlog->operating_system_id != null)?$problemlog->operatingSystem->operating_system_name:"-" }}" value="{{ ($problemlog->operating_system_id != null)?$problemlog->operatingSystem->operating_system_name:"" }}"> -->
                        </div>

                        <!-- Application software input -->
                        <div id="select-app-software">
                            <label for="app-software" class="label-default">Application Software</label> <br>
                            <select name="app_software" id="app-software" class="select-default" onchange="getAjax()">
                                <option selected value="-"> - </option>
                                @foreach($software as $option)
                                    @if($option->id == $problemlog->software_id)
                                        <option value = "{{$option->id}}" selected> {{$option->name}} </option>
                                    @else
                                        <option value = "{{$option->id}}"> {{$option->name}} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <h4 class="italic-light"> <em> OR </em> </h4>

                    <!-- Hardware input section -->
                    <div id="hardware-section">
                        <label for="serial-num" class="label-default">Serial Number</label> <br>
                        <input type="text" name="serial_num" id="hardware-input" onchange="getAjax()" class="small-text-input" placeholder="{{ ($problemlog->hardware_id != null)?$problemlog->hardware->serial_num:"-" }}" value="{{ ($problemlog->hardware_id != null)?$problemlog->hardware->serial_num:"" }}">
                    </div>

                </div>

            </div>

            <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
                <div class="input-group-header">
                    <h3 class="section-heading" class="label-default">  Notes   </h3>
                </div>

                <div class="input-group-content">
                    <!-- Input field for title -->
                    <label for="title" class="label-default"> Title  <span class="required-field">*</span></label> <br>
                    <input type="text" name="title" id="query-title-input"class="small-text-input" placeholder="{{ $problemlog->title }}" value="{{ $problemlog->title }}"> <br>
                    <br>

                    <!-- Input field for Description -->
                    <label for="description" class="label-default">Description <span class="required-field">*</span> </label> <br>
                    <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                    <textarea name="description" id="query-description-input" class="large-text-input" >{{ $problemlog->description }}</textarea>

                </div>
            </div>

            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-container"> <!-- this just adds a margin so the space above and below the container are the same - making it look symmetrical -->
                <div class="input-group-header">
                    <h3 class="section-heading">  Category   </h3>
                </div>

                <div class="input-group-content">
                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">
                            <label for="generic-category" class="label-default"> General category </label> <br>
                            <select name="generic_category" id="generic-category" class="select-default" onchange="getSpecificCategoryBasedOnGeneric()">
                                <option selected> - </option>
                                @foreach($genericCategory as $thisCategory)
                                    @if((
                                        $problemlog->problemType->problem_id != null &&
                                        $problemlog->problemType->parentProblem->problem_type == $thisCategory
                                        ) ||
                                        $problemlog->problemType->problem_type == $thisCategory
                                    )
                                        <option value="{{ $thisCategory }}" selected> {{ $thisCategory }}</option>
                                    @else
                                        <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific-category" class="label-default"> Specific category</label> <br>
                            <select name="specific_category" id="specific-category" class="select-default" onchange="getGenericCategoryBasedOnSpecific()">
                                <option selected> - </option>
                                @foreach($specificCategory as $thisCategory)
                                    @if(
                                        $problemlog->problemType->problem_id != null &&
                                        $problemlog->problemType->problem_type == $thisCategory
                                    )
                                        <option value="{{ $thisCategory }}" selected> {{ $thisCategory }}</option>
                                    @else
                                        <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="button" id="reset-category-list" class="btn-secondary" onclick="reloadCategoryInfo()"> &#x27F3 Reset options </button>

                </div>
            </div>

            <!-- ########################################################################### -->
            <!-- Option: choose a solution or allocate to a specialist -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-provide-solution" class="toggle-button toggle-selected" value="Provide solution" onclick="displayAppropriateInputField('Solution')">
                <input type="hidden" id="option-selected" name="option_selected" value="Solution"> <!-- this tag is there to help the backend team determine which section to validate-->
                <input type="button" id="toggle-assign-specialist" class="toggle-button" value="Assign specialist" onclick="displayAppropriateInputField('Specialist')">
            </div>
            <br>


            <div id="recommended-solution-section">
            {{-- this will be rendered via ajax --}}
            </div>

            <div id="assign-specialist-section" class="container-hide">
                <label for="specialist-location" class="label-default"> Specialist location </label> <br>
                <select name="location_type" id="location-type" class="select-default" >
                    <option value="anywhere"> Anywhere </option>
                    <option value="near-you"> Near you </option>
                </select>

                <br> <br>
                <!-- Importance level to indicate how this problem is effecting the client's work / productivity -->
                <label for="importance-level" class="label-default">Importance level </label> <br>
                <select name="importance_level" id="importance-level-input" class="select-default" >
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>

                <br><br>
                 <!-- Submit button for form -->
                <button id="query-submit-btn" class="btn-primary" type="submit" name="submit"> Submit  &#8594; </button>

            </div>

        </form>
    </div>

    <script>

        function getAjax(){

            $.ajax({
                url: '{{ route('custom_solutions') }}',
                type: 'POST',
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                datatype : "json",
                data: {
                    software : $( '#app-software' ).val(),
                    hardware : $( '#hardware-input' ).val(),
                },
                success: function(response){
                    console.log(response);
                    $( '#recommended-solution-section' ).html(response['html']);
                }
            })
        }

        $(document).ready(getAjax());

        // This stops enter submitting form
        $('form input').keydown(function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            return false;
        }
    });

    </script>

    <script src="{{ asset('js/client/register.js')}}"></script>

@endsection
