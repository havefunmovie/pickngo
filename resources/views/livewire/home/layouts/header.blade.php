<nav class="navbar bg-transparent navbar-expand-lg mt-md-2">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img class="w-75" src="{{ asset('images/home/logo.png') }}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="">
                <img src="{{ asset('assets/icons/hamburger.png') }}" alt="">
            </span>
        </button>
        <div class="collapse navbar-collapse text-end" id="navbarText">
            <ul class="navbar-nav ms-auto px-md-3 mb-lg-0">
                <li class="nav-item ms-md-3">
                    <a class="nav-link fs-7 {{ Route::currentRouteName() == 'home.index' ? 'active' : '' }} " aria-current="page" href="{{ route('home.index') }}">{{ __('Home') }}</a>
                </li>
                <li class="nav-item ms-md-3">
                    <a class="nav-link fs-7" aria-current="page" href="{{ asset('/') }}">{{ __('About Us') }}</a>
                </li>
                @if(auth()->check())
                    <li class="nav-item ms-md-3">
                        <a class="nav-link fs-7 {{ in_array(Route::currentRouteName(),['home.services.parcel','home.services.*']) ? 'active' : '' }}" aria-current="page" href="{{ route('home.services.parcel') }}">{{ __('Services') }}</a>
                    </li>
                @endif
            </ul>
            <span class="navbar-text">
                @if(auth()->check())
                    <a href="{{ route('logout') }}" class="btn btn-pink btn-outline-pink rounded-pill px-4 fs-8">{{ __('Logout') }}</a>
                    @if(!is_null(auth()->user()->level))
                        <a href="{{ route('dashboard') }}" class="btn btn-pink rounded-pill px-4 fs-8">{{ __('Dashboard') }}</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-pink rounded-pill px-4 fw-light fs-8">{{ __('Sign In') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-pink rounded-pill px-4 fs-8">{{ __('Sign Up') }}</a>
                @endif
            </span>
        </div>
    </div>
</nav>
