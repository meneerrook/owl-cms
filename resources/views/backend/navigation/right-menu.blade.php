
<div class="menu-heading">
    <h3>{{ $menuItems['title'] }}</h3>
</div>
<ul>
    @foreach($menuItems['top'] as $menuItem)
        @php
            $hasRights = false;
            foreach ($menuItem['roles'] as $key => $value) {
                if ($value == Auth::user()->role) {
                    $hasRights = true;
                } 
            }
            
            //ALSO USE THIS IN THE BOTTOM HALF:
                /* Instead of foreaching the roles array: */
                // $hasRights = in_array(Auth::user()->role, $menuItem['roles']);
            
                /* Use this for clear code: */
                // $pageClass = str_replace(' ', '-', strtolower($menuItem['page']));
            
                /* Use this for clear code: */
                // $activeClass = ( Request::path() == $menuItem['route'] ? 'active' : '' );
            
                /* use this for clear code: */
                // $itemRoute = ( $menuItem['hasid'] ? route($menuItem['route'], ['id' => $id]) : route($menuItem['route']) )
        @endphp

        @if ($hasRights)
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
        @foreach ($menuItems['bottom'] as $menuItem)
            <li class="menu-item_{{ strtolower($menuItem['page']) }} {{ Request::path() == $menuItem['route'] ? 'active' : '' }}">
                <a href="{{ route($menuItem['route']) }}" class="menu-item {{ $menuItem['class'] }}" data-xhr-page>
                    <i class="{{ $menuItem['icon'] }}"></i>{{ $menuItem['page'] }}
                </a>
            </li>
        @endforeach
    </ul>
@endif