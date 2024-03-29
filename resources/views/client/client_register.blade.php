@extends('base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/message_alert.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    <!-- Page content -->
    <div class="page-container">
        <h2 class="page-title"> Register </h2>
        <hr class="page-title-hr">



        <!-- Creating a form section so we can retrieve their input in the backend once it is submitted -->
        <form action="{{ route('validateRegisterProblem') }}" method="post">
            @csrf
            <!-- ########################################################################### -->
            <!-- Hardware and Software section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading">  Enter the appropriate equipment details <span class="required-field">*</span>  </h3>
                </div>

                <div class="input-group-content">
                    <!-- Asking the user for their input on software and hardware so we can check if they are licensed or not -->
                    <div class="flex-input-container">
                        <!-- Operating system input -->
                        <div id="select-os">
                            <label for="operating_system" class="label-default">Operating system</label> <br>
                            <select name="operating_system" id="os-system" class="select-default" >
                            <option value="" selected> - </option>
                            @foreach($operatingSystems as $option)
                                @if ( old('operating_system') == $option->id )
                                    <option value = "{{ $option->id }}" selected> {{ $option->operating_system_name }} </option>
                                @else
                                    <option value = "{{ $option->id }}"> {{ $option->operating_system_name }} </option>
                                @endif
                            @endforeach
                            </select>
                        </div>

                        <!-- Application software input -->
                        <div id="select-app-software">
                            <label for="app_software" class="label-default">Application Software</label> <br>
                            <select name="app_software" id="app-software" class="select-default" onchange="getAjax()">
                                <option value="" selected> - </option>
                                @foreach($software as $option)
                                    @if ( old('app_software') == $option->id )
                                    <option value = "{{ $option->id }}" selected> {{ $option->name }} </option>
                                    @else
                                        <option value = "{{ $option->id }}"> {{ $option->name }} </option>
                                    @endif
                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('app_software')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror
                    @error('operating_system')
                        <div style = "color:red; font-size: small">
                           {{$message}}
                        </div>
                    @enderror

                    <h4 class="italic-light"><em> OR </em></h4>

                    <!-- Hardware input section -->
                    <div id="hardware-section">
                        <label for="serial_num" class="label-default">Serial Number</label> <br>
                        <input type="text" name="serial_num" id="hardware-input" class="small-text-input" value="{{old('serial_num') }}" onchange="getAjax()">
                    </div>
                    @error('serial_num')
                        <div style = "color:red; font-size: small">
                           {{$message}}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- ########################################################################### -->
            <!-- Problem Title and description section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading" class="label-default">  Notes   </h3>
                </div>

                <div class="input-group-content">
                    <!-- Input field for title -->
                    <label for="title" class="label-default" > Title <span class="required-field">*</span> </label> <br>
                    <input type="text" name="title" id="query-title-input"class="small-text-input" placeholder="Give your problem a title" value="{{ old('title') }}" maxlength="255"> <br>
                    <!-- Ensuring title field is filled -->
                    @error('title')
                        <div style = "color:red; font-size: small">
                            {{$message}}
                        </div>
                    @enderror
                    <br>

                    <!-- Input field for Description -->
                    <label for="description" class="label-default">Description <span class="required-field">*</span></label> <br>
                    <!-- Don't leave any space between the opening and closing tag of textarea, those extra space are added in the text input, life is weird -->
                    <textarea name="description" id="query-description-input" class="large-text-input" placeholder="Describe your problem in detail ....">{{old('description')}}</textarea>
                    <!-- Ensuring description field is filled -->
                    @error('description')
                    <div style = "color:red; font-size: small" >
                        {{$message}}
                    </div>
                    @enderror

                </div>
            </div>


            <!-- ########################################################################### -->
            <!-- Problem categorization section -->
            <div class="input-group-container">
                <div class="input-group-header">
                    <h3 class="section-heading">  Category   </h3>
                </div>

                <div class="input-group-content">
                    <div class="flex-input-container">
                        <!-- Input section -->
                        <div id="generic-categorization-container">  <!-- this div is CSS flex child   -->
                            <label for="generic_category" class="label-default">General category <span class="required-field">*</span> </label> <br>
                            <select name="generic_category" id="generic-category" class="select-default" onchange="getSpecificCategoryBasedOnGeneric()">
                                <option value="" selected> - </option>
                                @foreach($genericCategory as $thisCategory)

                                    @if ( old('generic_category') == $thisCategory )
                                        <option value="{{ $thisCategory }}" selected> {{ $thisCategory }}</option>
                                    @else
                                        <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div id="specific-categorization-container">
                            <label for="specific_category" class="label-default"> Specific category</label> <br>
                            <select name="specific_category" id="specific-category" class="select-default" onchange="getGenericCategoryBasedOnSpecific()">
                            <option value="" selected> - </option>
                            @foreach($specificCategory as $thisCategory)
                                @if ( old('specific_category') == $thisCategory )
                                    <option value="{{ $thisCategory }}" selected> {{ $thisCategory }}</option>
                                @else
                                    <option value="{{ $thisCategory }}"> {{ $thisCategory }}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                    </div>
                    @error('generic_category')
                        <div style = "color:red; font-size: small">
                            {!! $message !!}
                        </div>
                    @enderror
                    

                    <button type="button" id="reset-category-list" class="btn-secondary" onclick="reloadCategoryInfo()"> &#x27F3 Reset options </button>
                </div>

            </div>
            <br>



            <!-- ########################################################################### -->
            <!-- Option: provide a solution or allocate to a specialist -->
            <div class="toggle-button-container">
                <input type="button" id="toggle-provide-solution" class="toggle-button toggle-selected" value="Provide solution" onclick="displayAppropriateInputField('Solution')">
                <input type="hidden" id="option-selected" name="option_selected" value="Solution"> <!-- this tag is there to help the backend team determine which section to validate-->
                <input type="button" id="toggle-assign-specialist" class="toggle-button" value="Assign specialist" onclick="displayAppropriateInputField('Specialist')">
            </div>
            <br>


            @error('solution_desc')
                <div id="solution-error-register">
                    <div style = "color:red; font-size: small">
                        {{ $message }}
                    </div>
                    <br>
                </div>
            @enderror

            <div id="recommended-solution-section">
                {{-- Anything here will be rendered by solution.blade.php --}}
            </div>

            <div id="assign-specialist-section" class="container-hide">
                <label for="specialist_location" class="label-default"> Specialist location </label> <br>
                <select name="specialist_location" id="specialist-location" class="select-default" >
                    <option value="anywhere"> Anywhere </option>
                    <option value="near-you"> Near you </option>
                </select>

                <br> <br>
                <!-- Importance level to indicate how this problem is effecting the client's work / productivity -->
                <label for="importance_level" class="label-default">Importance level </label> <br>
                <select name="importance_level" id="importance-level-input" class="select-default" >
                    <option value="Low">Low</option>
                    <option value="Medium">Medium</option>
                    <option value="High">High</option>
                </select>

                <!-- Submit button for form -->
                <br><br>
                <button id="query-submit-btn" class="btn-primary" type="submit" name="submitSpec" value = "spec"> Submit  &#8594; </button>

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
