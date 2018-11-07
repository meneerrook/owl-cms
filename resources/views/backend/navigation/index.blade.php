@if(Auth::check())
    <nav class="main-menu">

        <div class="left">
            <div class="logo">
                <a href="" class="menu-link">
                    <img src="{{ asset('images/owl_logo.svg') }}" alt="Owl" />
                </a>
            </div>
            <a href="#" class="menu-link text">&plus;</a>
            <a href="#" class="menu-link icon"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
        </div>
        <div class="right">
            <div class="heading">
                <h3>Owl CMS</h3>
            </div>
            <ul>
                <li class="dashboard {{ Request::path() == 'owl/dashboard' ? 'active' : '' }}">
                    <a href="{{ route('owl/dashboard') }}" class="menu-item">
                        <i class="fa fa-bar-chart"></i>Dashboard
                    </a>
                </li>
                <li>
                    <a href="" class="menu-item">
                        <i class="fa fa-thumb-tack"></i>Posts
                    </a>
                </li>
                <li>
                    <a href="" class="menu-item">
                        <i class="fa fa-files-o"></i>Pages
                    </a>
                </li>
                <li>
                    <a href="" class="menu-item">
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