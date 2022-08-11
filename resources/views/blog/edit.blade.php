@extends('layout.master')

@section("title") Edit Blog | Blog @stop
@section("content")
    
<div class="mt-5">
    <h4>Edit Blog</h4>
    <hr>
    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title')
                is-invalid
            @enderror" value="{{ old('title'), $blog->title }}">

            @error('title')
               <div class="invalid-feedback">
                    {{ $message }}
               </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea type="text" rows="10" name="description" class="form-control @error('description')
                is-invalid
            @enderror">
                    {{ old('description'), $blog->description }}
        </textarea>

            @error('description')
            <div class="invalid-feedback">
                {{ $message }}
           </div>
             @enderror

        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Add Post</button>
        </div>
    </form>
</div>

@endsection
