@extends('layouts.main')
@section('content')
    <div class="container">

        @if($errors->any())
            <div class="alert alert-warning col-lg-6 offset-lg-3 col-12 border-0 shadow mt-4">
                <ol>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif

        <div class="container mt-4">
            <div class="card col-lg-6 offset-lg-3 col-12 border-0 shadow">
                <div class="card-header text-center border-0">
                    <h4 class="m-0">Article Create</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <div class="avatar-upload">
                                <div class="avatar-edit image">
                                    <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg"/>
                                    <label for="imageUpload" class="image-label"></label>
                                </div>
                                <div class="avatar-preview border-3" style="border-radius: 10%;">
                                    <div id="imagePreview"
                                         style="background-image: url({{ asset('icons/add.png') }}); border-radius: 0;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>Title</label> <span class="text-danger">*</span>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label>Body</label> <span class="text-danger">*</span>
                            <textarea name="body" class="form-control" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Category</label> <span class="text-danger">*</span>
                            <select class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">
                                        {{ $category['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="Add Article"
                               class="btn btn-green">
                        <a href="{{ route('articles.index') }}" class="btn btn-outline-red">Cancel</a>
                    </form>

                </div>
            </div>
        </div>

@endsection

        @push('js-content')
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                            $('#imagePreview').hide();
                            $('#imagePreview').fadeIn(650);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#imageUpload").change(function () {
                    readURL(this);
                });

            </script>
    @endpush
