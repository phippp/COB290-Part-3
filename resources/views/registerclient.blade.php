@extends('app')

@section('content')
    <<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <!-- Navigation  -->
        <div class="nav-container"> <!-- this class applies background styling to our navigation-->

            <nav> <!-- This is a flex container and it will centers all the content that we will be showing-->
                
                <div class="logo">
                    <h1 id="logo-name"> Make-It-All </h1>
                    <!-- The div below will store icon/images which will be displayed if the user screen is small -->
                    <div id="nav-state-icon">
                        <!-- FUTURE NOTE: may want to replace the character code into image -->
                        <span id="close-nav" class="container-hide">&#10005;</span>
                        <span id="open-nav">&#8801;</span>
                    </div>
                </div>

                <!-- All the main navigation links goes here -->
                <div id="primary-nav-links">
                    <a href="#" class="nav-link-active"> Dashboard </a>
                    <a href="#"> Register </a>        
                </div>
                
                <!-- All the secondary navigation link goes here -->
                <div id="secondary-nav-links">
                    <a href="#" id="current-emp-name"> Forename surname </a>
                    <!-- The div contains all the navigation link we want to show when the user hovers over nav section-->
                    <div class="drop-down-nav">
                        <a href="#"> Language </a>
                        <a href="#"> Logout </a>
                    </div>
                </div>
        
            </nav>
        </div>
    <!-- end of navigation -->
    </body>
@endsection