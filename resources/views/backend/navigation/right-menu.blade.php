@php
    $menuItems = config($menuItems);
@endphp

<div class="menu-heading">
    <h3>{{ $menuItems['title'] }}</h3>
</div>
<ul>
    @foreach($menuItems['top'] as $menuItem)
        <li class="menu-item_{{ strtolower($menuItem['page']) }} {{ Request::path() == $menuItem['route'] ? 'active' : '' }}">
            <a href="{{ route($menuItem['route']) }}" class="menu-item {{ $menuItem['class'] }}" data-xhr-page>
                <i class="{{ $menuItem['icon'] }}"></i>{{ $menuItem['page'] }}
            </a>
        </li>
    @endforeach
</ul>

@if (count($menuItems['bottom']) > 0)
    <hr>
    <ul class="m-0">
        @foreach($menuItems['bottom'] as $menuItem)
            <li class="menu-item_{{ strtolower($menuItem['page']) }} {{ Request::path() == $menuItem['route'] ? 'active' : '' }}">
                <a href="{{ route($menuItem['route']) }}" class="menu-item {{ $menuItem['class'] }}" data-xhr-page>
                    <i class="{{ $menuItem['icon'] }}"></i>{{ $menuItem['page'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif