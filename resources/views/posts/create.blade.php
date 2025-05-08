@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1>新建文章</h1>

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
                <label for="title" class="form-label">标题</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                <small id="titleCount" class="form-text text-muted">0 字</small>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">内容</label>
                <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content') }}</textarea>
                <small id="contentCount" class="form-text text-muted">0 字</small>
            </div>

            <button type="submit" class="btn btn-primary">发布文章</button>
        </form>
    </div>

    <script>
        // 监听标题输入框的字符变化
        document.getElementById('title').addEventListener('input', function () {
            document.getElementById('titleCount').textContent = this.value.length + ' 字';
        });

        // 监听内容输入框的字符变化
        document.getElementById('content').addEventListener('input', function () {
            document.getElementById('contentCount').textContent = this.value.length + ' 字';
        });
    </script>
@endsection
