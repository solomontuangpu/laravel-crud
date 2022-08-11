@extends('layout.master')

@section("title") Home | Blog @stop
@section("content")

<div class="my-3">
  
    <h4>{{ $blog->title }}</h4>

    <p>{{ $blog->description }}</p>
    <span>{{ $blog->created_at->diffForHumans() }}</span>
</div>
         
@endsection
