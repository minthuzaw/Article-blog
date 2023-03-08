<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('logos/idea-logo.png') }}" alt="logo" width="30px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--Nav Bar-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link text-info" href="{{ route('articles.index') }}">Articles</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @auth()
                    <li class="nav-item mt-1">
                        <a class="btn btn-blue nav-link"
                           href="{{ route('articles.create') }}">
                            Add Article
                        </a>
                    </li>
                @endauth

                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link link-hover" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                        </li>
                    @endif

{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img
                                src="{{ Auth::user()->profile ? config('app.url').'/images/'.Auth::user()->profile : asset('favicon/user.png') }}"
                                class="rounded-circle mx-1" alt="Profile image"
                                style="width: 2rem;height: 2rem"> {{ ucfirst(Auth::user()->name) }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="navbarDropdown">

                            <a href="{{ route('profiles.index') }}" class="dropdown-item px-1">
                                <i class="fa-solid fa-user-tie mx-2"></i> Profile
                            </a>

                            <a class="dropdown-item px-1" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket mx-2"></i>{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>


    </div>
</nav>
