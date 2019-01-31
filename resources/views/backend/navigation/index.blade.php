<nav class="mobile-menu">
    <div class="hamburger toggle-main-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>

<nav id="main-menu" class="main-menu">
    
    <div id="left-menu" class="left">
        @include('backend/navigation/left-menu')
    </div>
    
    <div id="right-menu" class="right">
        @include('backend/navigation/right-menu')
    </div>
    
    @include('backend/partials/skeleton/right-menu')

</nav>

@include('backend/navigation/create-menu')