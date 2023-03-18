<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('logos/idea-logo.png') }}" alt="logo" width="30px">
        </a>
        <a class="nav-link p-0 d-lg-none"
           href="{{ route('articles.index') }}">
            <h5 class="m-0 heading-color">Articles</h5>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--Nav Bar-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto d-none d-lg-block">
                <li class="nav-item">
                    <a class="nav-link p-0"
                       href="{{ route('articles.index') }}">
                        <h5 class="m-0 heading-color">Articles</h5>
                    </a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link link-hover" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown me-3">
                        <x-nav.profile/>
                    </li>

                    <li class="nav-item dropdown me-1">
                        <x-nav.search-model/>
                    </li>
                @endguest
            </ul>
        </div>


    </div>
</nav>
