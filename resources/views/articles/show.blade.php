@extends("layouts.main")
@section("content")
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card mb-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">{{ $article->title }}</h5>

                    <div class="justify-content-end">
                        @if($article->user_id === \Illuminate\Support\Facades\Auth::id())
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-red btn-sm">Delete</button>
                            </form>
                        @endif
                    </div>

                </div>


                <div class="card-subtitle mb-2 text-muted small">
                    {{ $article->created_at->diffForHumans() }}
                    Category: <b>{{ $article->category->name }}</b>
                </div>
                <p class="card-text">{{ $article->body }}</p>


            </div>
        </div>
        {{--comment--}}
        <ul class="list-group mb-2">
            <li class="list-group-item active">
                <b>Comments ({{ count($article->comments) }})</b></li>
            @foreach($article->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->comment }}
                    <div class="d-flex justify-content-between">
                        <div class="small mt-2 justify-content-start">
                            By <b>{{ $comment->user->name }}</b>,
                            {{ $comment->created_at->diffForHumans() }}
                        </div>

                        @if($comment->user_id === \Illuminate\Support\Facades\Auth::id())
                            <div class="justify-content-end">
                                <a href="{{ route('comments.destroy', $comment->id) }}"
                                   class="btn btn-sm btn-red">Delete</a>
                            </div>
                        @endif
                    </div>


                </li>
            @endforeach
        </ul>

        @if($errors->any())
            <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
            </div>
        @endif
        {{--Add comments--}}
        @auth()
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="comment" class="form-control mb-2 input" placeholder="New Comment"></textarea>
                <input type="submit" class="btn btn-secondary button" value="Add Comment">
            </form>
        @endauth
    </div>
    <div class="d-flex justify-content-center bg-success">
        <div class="mt-4 mb-5">
            <img src="{{ asset($article->qr_code) }}" alt="" width="200" height="200">
        </div>
    </div>
@endsection

{{--@push('js-content')--}}
{{--    <script>--}}
{{--        let input = document.querySelector(".input");--}}
{{--        let button = document.querySelector(".button");--}}
{{--        button.disabled = true;--}}
{{--        input.addEventListener("change", stateHandle);--}}

{{--        function stateHandle() {--}}
{{--            if (document.querySelector(".input").value === "") {--}}
{{--                button.disabled = true;--}}
{{--            } else {--}}
{{--                button.disabled = false;--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}
