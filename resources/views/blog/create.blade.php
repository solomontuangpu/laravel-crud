@extends('layout.master')

@section("title") Create New Blog | Blog @stop
@section("content")
    
<div class="mt-5">
    <h4>Create New Blog</h4>
    <hr>
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
     
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title')
                is-invalid
            @enderror">

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
            @enderror"></textarea>

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
