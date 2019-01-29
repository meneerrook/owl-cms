<nav id="create-menu" class="create-menu">
    <div class="left">
        <div class="logo">
            <a href="" class="menu-link" data-xhr-page>
                <img src="{{ asset('images/owl_logo_black.svg') }}" alt="Owl" />
            </a>
        </div>
        <a href="#" class="toggle-create-menu menu-link icon"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
    </div>
    <div class="right">

        @php
            $menuItems = config('navigation.main.create-menu');
        @endphp

        <div class="menu-heading">
            <h3>{{ $menuItems['title'] }}</h3>
        </div>
        <div class="menu-sub-heading">
            <h4>{{ $menuItems['subtitle'] }}</h4>
        </div>
        <ul>
            @foreach($menuItems['top'] as $menuItem)
                @php
                    $hasRights = false;
                    foreach( $menuItem['roles'] as $key => $value) {
                        if($value == Auth::user()->role) {
                            $hasRights = true;
                        } 
                    }
                @endphp
                @if($hasRights)
                    <li class="menu-item_{{ str_replace(' ', '-', strtolower($menuItem['page'])) }} {{ Request::path() == $menuItem['route'] ? 'active' : '' }}">

                        <a href="{{ $menuItem['hasid'] === true ? route($menuItem['route'], ['id' => $id]) : route($menuItem['route']) }}" class="menu-item {{ $menuItem['class'] }}" data-xhr-page>
                            <i class="{{ $menuItem['icon'] }}"></i>{{ $menuItem['page'] }}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
<div id="menu-overlay" class="menu-overlay"></div>
