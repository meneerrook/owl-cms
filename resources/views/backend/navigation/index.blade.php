@if(Auth::check())
    <nav class="mobile-menu">
        <div class="hamburger toggle-main-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>

    <nav id="main-menu" class="main-menu">
        
        <div class="left">
            <div class="logo">
                <a href="" class="menu-link">
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
                        <span class="popover-title">{{ Auth::user()->email }}</span>
                        <ul>
                            <li><a href="{{ route('owl/logout') }}" class="popover-link">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="right">
            <div class="menu-heading">
                <h3>Owl CMS</h3>
            </div>
            <ul>
                <li class="menu-item_dashboard {{ Request::path() == 'owl/dashboard' ? 'active' : '' }}">
                    <a href="{{ route('owl/dashboard') }}" class="menu-item">
                        <i class="fa fa-bar-chart"></i>Dashboard
                    </a>
                </li>
                <li class="menu-item_posts {{ Request::path() == 'owl/posts' ? 'active' : '' }}">
                    <a href="{{ route('owl/posts') }}" class="menu-item">
                        <i class="fa fa-thumb-tack"></i>Posts
                    </a>
                </li>
                <li class="menu-item_pages {{ Request::path() == 'owl/pages' ? 'active' : '' }}">
                    <a href="{{ route('owl/pages') }}" class="menu-item">
                        <i class="fa fa-files-o"></i>Pages
                    </a>
                </li>
                <li class="menu-item_media {{ Request::path() == 'owl/media' ? 'active' : '' }}">
                    <a href="{{ route('owl/media') }}" class="menu-item">
                        <i class="fa fa-film"></i>Media
                    </a>
                </li>
                <li>
                    <a href="" class="menu-item">
                        <i class="fa fa-comment-o"></i>Comments
                    </a>
                </li>
            </ul>
            <hr>
            <ul class="m-0">
                <li class="dashboard">
                    <a href="" class="menu-item">
                        <i class="fa fa-users"></i>Users
                    </a>
                </li>
                <li>
                    <a href="" class="menu-item">
                        <i class="fa fa-sliders"></i>Settings
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    @include('backend/navigation/create-menu')
@endif