<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">                                                
<nav class="navbar">
    <div class="container">
        <!-- Logo -->
        <div class="navbar-logo">
            <a href="{{ url('/') }}">
            <img src="{{ asset('images/Team23 Logo No background.png') }}" alt="beActive" style="width: 50px; height: auto;" class="img">
            </a>
        </div>
        
        <div class = "dropdown-container">
            <!-- Navigation Links -->
            <div class="navbar-links">
                <ul>
                    <li>
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            {{ __('Dashboard') }} 
                        </a>
                    </li>
                </ul>
            </div>

            <!-- User Dropdown -->
            <div class="user-menu">
                <button class="user-button">
                    {{ Auth::user()->name }}
                    <span class="dropdown-icon">▼</span>
                </button>
                <div class="user-dropdown">
                    <a href="{{ url('/') }}">{{ __('Home') }}</a>
                    @auth
                    @if(auth()->user()->useraccess == 'admin')
                        <a href="{{ route('admin.dashboard') }}">{{ __('Admin Dashboard') }}</a>
                    @else
                        <a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    @endif
                    @endauth

                    <a href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">{{ __('Log Out') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</nav>
