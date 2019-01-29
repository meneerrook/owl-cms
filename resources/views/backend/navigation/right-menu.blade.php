@php
    $menuItems = config($menuItems);
@endphp

<div class="menu-heading">
    <h3>{{ $menuItems['title'] }}</h3>
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