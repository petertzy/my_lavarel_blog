@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>Create New Post</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                <small id="titleCount" class="form-text text-muted">0 characters</small>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                <small id="contentCount" class="form-text text-muted">0 characters</small>
            </div>

            <button type="submit" class="btn btn-primary">Publish Post</button>
        </form>
    </div>

    <script>
        // Listen for character changes in the title input
        document.getElementById('title').addEventListener('input', function () {
            document.getElementById('titleCount').textContent = this.value.length + ' characters';
        });

        // Listen for character changes in the content textarea
        document.getElementById('content').addEventListener('input', function () {
            document.getElementById('contentCount').textContent = this.value.length + ' characters';
        });
    </script>
@endsection
