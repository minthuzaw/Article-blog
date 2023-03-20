@extends("layouts.app")
@section("content")
    <div class="container">
        @if(session('info'))
            <div class="alert alert-info alert-dismissible fade show">
                {{ session('info') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <x-blog-home-screen-heading/>

        <x-search/>

        {{--blog card--}}
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6 col-sm-2 col-lg-3 mb-4">
                    <a href="{{ route('articles.show', $article->id) }}" class="text-decoration-none text-black">
                        <div class="card shadow rounded-4 border-0">
                            <img src="{{ $article->image ?
                                        config('app.url').'/images/'.$article->image :
                                        'https://picsum.photos/200/200?random=' . $article->id}}"
                                 class="card-img-top rounded-4 w-full"
                                 style="height: 350px;"
                            >
                            <div class="card-body">
                                <span
                                    class="category px-2 py-1 rounded-5 text-uppercase">{{ $article->category->name }}</span>
                                <h5 class="card-title text-truncate mt-2">{{ $article->title }}</h5>
                                <span class="text-muted">Published {{ $article->created_at->diffForHumans() }}</span>
                                <span class="line-clamp-2 card-text">
                                    {!! $article->body !!}
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{ $articles->links() }}
        </div>

        {{--            <div class="card mb-2 border-0 shadow-sm">--}}
        {{--                <div class="card-body">--}}
        {{--                    <div class="row">--}}
        {{--                        <div class="col-md-8">--}}
        {{--                            <h5 class="card-title">{{ $article->title }}</h5>--}}
        {{--                            <div class="card-subtitle mb-2 text-muted small">--}}
        {{--                                {{ $article->created_at->diffForHumans() }}--}}
        {{--                                Category: <span class="badge bg-green">{{ $article->category->name }}</span>--}}
        {{--                            </div>--}}
        {{--                            <p class="card-text">{{ $article->body }}</p>--}}
        {{--                            <a class="card-link" href="{{ route('articles.show', $article->id) }}">--}}
        {{--                                View Detail &raquo;--}}
        {{--                            </a>--}}
        {{--                        </div>--}}
        {{--                        <div class="col-md-4">--}}
        {{--                            <img src="{{ asset($article->qr_code) }}" alt="">--}}
        {{--                        </div>--}}
        {{--                    </div>--}}

        {{--                </div>--}}
        {{--            </div>--}}

    </div>
@endsection
