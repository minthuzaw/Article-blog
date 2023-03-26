<div class="text-center mobile-dropdown">
    <a href="{{ route('profiles.index') }}" class="dropdown-item my-3 py-2 d-lg-none d-md-none
    {{ request()->is('profiles') ? 'text-blue bg-gray-100 rounded-2' : 'text-black'}}">
        <i class="fa-solid fa-user-tie mx-2"></i> Profile
    </a>
    @auth()
        <a href="{{ route('articles.create') }}" class="dropdown-item my-3 py-2 d-lg-none d-md-none
        {{ request()->is('articles/create') ? 'text-blue bg-gray-100 rounded-2' : 'text-black'}}">
            <i class="fa fa-square-plus mx-2"></i> Add Article
        </a>
    @endauth

    <a class="dropdown-item my-3 py-2 text-red-400 d-lg-none d-md-none" href="{{ route('logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa-solid fa-right-from-bracket mx-2"></i>{{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
