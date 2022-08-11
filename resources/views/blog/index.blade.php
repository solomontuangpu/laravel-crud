@extends('layout.master')

@section("title") Home | Blog @stop
@section("content")

<div class="my-3">

    <form action="{{ route('blogs.index') }}" method="GET">
         <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search" name="keyword">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
    </form>

    
    @if (session('status'))
        <div class="alert alert-success"> {{ session('status') }} </div>
    @endif
        
    <table class="table table-striped table-bordered align-middle">
        <thead>
           <tr>
            <th>#</th> 
            <th>blogs</th>
            <th>control</th>
            <th>created_at</th>
           </tr>
        </thead>
        <tbody>

            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td class="small mb-0">
                       <span class="fw-bold"> {{ Str::substr($blog->title, 0, 50) }}</span>
                       <br>
                        <span class="text-black-50">{{ Str::substr($blog->description, 0, 100) }}</span>
                    </td>
                    
                    <td class="">
                        <a href="{{ route('blogs.show', $blog->id ) }}" class="btn btn-warning btn-sm">Detail</a>
                        <a class="btn btn-info btn-sm" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" class="d-inline-block" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    <td>{{ $blog->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div class="">
      {{--   {{ $blogs->appends(request()->query())->links() }} --}}
        {{ $blogs->links() }}
        
    </div>

</div>
         
@endsection
