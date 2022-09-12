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
        @foreach($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }} : {{ $article->id }}</h5>
                    <div class="card-subtitle mb-2 text-muted small">
                        {{ $article->created_at->diffForHumans() }}
                        Category: <b>{{ $article->category->name }}</b>
                    </div>
                    <p class="card-text">{{ $article->body }}</p>
                    <a class="card-link" href="{{ route('articles.show', $article->id) }}">
                        View Detail &raquo;
                    </a>
                </div>
            </div>
        @endforeach
        {{ $articles->links() }}
    </div>
@endsection
