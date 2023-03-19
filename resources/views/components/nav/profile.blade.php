{{--class ="dropdown-toggle" --}}
<a id="navbarDropdown" class="nav-link shadow-md p-0" href="#" role="button"
   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <img
        src="{{ Auth::user()->profile ? config('app.url').'/images/'.Auth::user()->profile :
        'https://ui-avatars.com/api/?name=' . Auth::user()->name }}"
        class="rounded-circle d-none d-lg-block d-md-block" alt="Profile image"
        style="width: 2.5rem;height: 2.5rem">
    {{--{{ ucfirst(Auth::user()->name) }}--}}
</a>

<div class="dropdown-menu dropdown-menu-end shadow-lg border-0"
     aria-labelledby="navbarDropdown">

    <a href="{{ route('profiles.index') }}" class="dropdown-item px-1 py-2">
        <i class="fa-solid fa-user-tie mx-2"></i> Profile
    </a>

    @auth()
        <a href="{{ route('articles.create') }}" class="dropdown-item px-1 py-2 color-green">
            <i class="fa fa-square-plus mx-2"></i> Add Article
        </a>
    @endauth

    <a class="dropdown-item px-1 py-2 text-red-400" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-right-from-bracket mx-2"></i>{{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

<x-nav.mobile-profile/>
