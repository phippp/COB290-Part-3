<div class="mb-scrollbar-view">
    <div class="sidebar-nav-container scrolltable-x">
        <a 
            href="{{ route('specialist_profile') }}"  
            @if($sideBarNav == 'profile') class= "sidebar-nav-active" @endif
        > 
            My Profile 
        </a>


        <a 
            href="{{ route('specialist_lang') }}" 
            @if($sideBarNav == 'lang') class= "sidebar-nav-active" @endif
        > 
            Language 
        </a>
        
    
        <a 
            href="{{ route('specialist_workdays') }}"
            @if($sideBarNav == 'workdays') class= "sidebar-nav-active" @endif
        > 
            Working Day 
        </a>



        <a 
            href="{{ route('specialist_availability') }}"
            @if($sideBarNav == 'availability') class= "sidebar-nav-active" @endif
        > 
            Availability  
        </a>
       
        
        <a 
            href="{{ route('specialist_skills') }}"
            @if($sideBarNav == 'skills') class= "sidebar-nav-active" @endif
        > 
            Skills 
        </a>
    </div>
</div>