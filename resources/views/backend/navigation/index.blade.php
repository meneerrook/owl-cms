@if(Auth::check())

    @php
        if($menuItems == 'menuitems.default') {
            $menuClass = '';
        } else {
            $menuClass = 'submenu';
        }
    @endphp

    <nav class="mobile-menu">
        <div class="hamburger toggle-main-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <nav id="main-menu" class="main-menu">
        
        <div class="left">

            @include('backend/partials/skeleton/left-menu')

            <div class="logo">
                <a href="{{ route('owl/dashboard') }}" class="menu-link" data-xhr-page>
                    <img src="{{ asset('images/owl_logo.svg') }}" alt="Owl" />
                </a>
            </div>
            <a href="#" class="toggle-main-menu close-menu menu-link icon"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
            <a href="#" class="toggle-create-menu menu-link text">&plus;</a>
            <a href="#" class="menu-link icon"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
            <div class="menu-links-bottom">
                <div class="menu-link-wrapper">
                    <span class="menu-link icon" data-toggle="#user-menu"><i class="fa fa-user"></i></span>
                    <div id="user-menu" class="menu-link-popover hidden">
                        <span class="popover-title">{{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}</span>
                        <ul>
                            <li><a href="{{ route('owl/logout') }}" class="popover-link">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="loader-wrapper menu-loader">
            <div class="spinner-loader">
                <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
            </div>
        </div>
        <div id="right-menu" class="right {{ $menuClass }}">
            @if($menuClass == 'submenu')
                @include('backend/partials/skeleton/sub-menu')
            @else
                @include('backend/partials/skeleton/right-menu')
            @endif
            
            @include('backend/navigation/right-menu')
        </div>
        
    </nav>

    @include('backend/navigation/create-menu')
@endif