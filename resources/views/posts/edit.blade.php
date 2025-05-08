@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Edit Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                <small id="titleCount" class="form-text text-muted">{{ strlen($post->title) }} characters</small>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                <small id="contentCount" class="form-text text-muted">{{ strlen($post->content) }} characters</small>
            </div>

            <button type="submit" class="btn btn-success">Update Post</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        // Listen for changes in the title input
        document.getElementById('title').addEventListener('input', function () {
            document.getElementById('titleCount').textContent = this.value.length + ' characters';
        });

        // Listen for changes in the content textarea
        document.getElementById('content').addEventListener('input', function () {
            document.getElementById('contentCount').textContent = this.value.length + ' characters';
        });
    </script>
@endsection
