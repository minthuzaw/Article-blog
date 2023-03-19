<a href="{{ route('profiles.index') }}" class="dropdown-item py-2 d-lg-none d-md-none">
    <i class="fa-solid fa-user-tie mx-2"></i> Profile
</a>

@auth()
    <a href="{{ route('articles.create') }}" class="dropdown-item py-2 d-lg-none d-md-none color-green">
        <i class="fa fa-square-plus mx-2"></i> Add Article
    </a>
@endauth

<a class="dropdown-item py-2 text-red-400 d-lg-none d-md-none" href="{{ route('logout') }}"
   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
    <i class="fa-solid fa-right-from-bracket mx-2"></i>{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
