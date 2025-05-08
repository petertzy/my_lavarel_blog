@extends('layout')

@section('content')
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    @foreach ($posts as $post)
        <div class="border p-3 mb-3">
            <h3>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </h3>
            <p>{{ Str::limit($post->content, 100) }}</p>

            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">Edit</a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
            </form>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection
