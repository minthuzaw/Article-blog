@extends('layouts.main')
@section('content')
    <div class="container mt-4">
        <div class="card col-lg-8 offset-lg-2 col-12 border-0 shadow">
            <div class="card-header text-center border-0">
                <h4 class="m-0">Article Create</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row mb-3">
                        <div class="avatar-upload">
                            <div class="avatar-edit image">
                                <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg"
                                       value="{{ old('image') }}"/>
                                <label for="imageUpload" class="image-label"></label>
                            </div>
                            <div class="avatar-preview border-3" style="border-radius: 10%;">
                                <div id="imagePreview"
                                     style="background-image: url({{ asset('icons/add.png') }}); border-radius: 0;">
                                </div>
                            </div>
                        </div>
                        @error('image')
                        <span class="text-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-6">
                            <x-form.input name="title" important="*"/>
                        </div>

                        <div class="col-6">
                            <x-form.category-dropdown name="category" important="*"/>
                        </div>
                    </div>


                    <div class="mb-3">
                        <x-form.textarea name="body" important="*">{{ old('body') }}</x-form.textarea>
                    </div>

                    <input type="submit" value="Add Article"
                           class="btn btn-green">
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-red">Cancel</a>
                </form>

            </div>
        </div>
    </div>
@endsection
