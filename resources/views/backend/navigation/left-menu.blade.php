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
                <li><a href="{{ route('owl/profile') }}" class="popover-link has-sub-menu" data-xhr-page>My profile</a></li>
                <li><a href="{{ route('owl/logout') }}" class="popover-link">Logout</a></li>
            </ul>
        </div>
    </div>
</div>