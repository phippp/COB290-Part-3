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
            <a href="{{ route('specialist') }}" class="{{  $navTitle == "dashboard" ? "nav-link-active" : "" }}"> Dashboard </a>
            <a href="{{ route('logoverview') }}" class="{{  $navTitle == "logbook" ? "nav-link-active" : "" }}"> Logbook </a>
            <a href="{{ route('devices') }}" class="{{  $navTitle == "devices" ? "nav-link-active" : "" }}"> Devices </a>
        </div>

        <div id="secondary-nav-links">
            <a href="#" id="current-emp-name"> {{auth()->user()->employee->forename}} {{auth()->user()->employee->surname}} </a>
            <!-- The div contains all the navigation link we want to show when the user hovers over nav section-->
            <div class="drop-down-nav">
                <a href="#" class="{{  $navTitle == "language" ? "nav-link-active" : "" }}"> Language </a>
                <form method="post" action="{{route('logout')}}">
                    @csrf
                    <button id="nav-logout"> Logout </button>
                </form>
            </div>
        </div>

    </nav>


</div>
<!-- end of navigation -->
