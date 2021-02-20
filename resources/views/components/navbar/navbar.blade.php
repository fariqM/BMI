<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        {{-- <x-navbar.search-form/> --}}
        @include('components.navbar.search-form')

        <ul class="navbar-nav">
            {{-- <x-navbar.language-dropdown/> --}}
            @include('components.navbar.language-dropdown')

            {{-- <x-navbar.apps-dropdown/> --}}
            @include('components.navbar.apps-dropdown')

            {{-- <x-navbar.message-dropdown/> --}}
            @include('components.navbar.message-dropdown')

            {{-- <x-navbar.notification-dropdown/> --}}
            @include('components.navbar.notification-dropdown')

            {{-- <x-navbar.profile-dropdown/> --}}
            @include('components.navbar.profile-dropdown')

        </ul>
    </div>
</nav>
