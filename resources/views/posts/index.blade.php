@extends('layout')

@section('content')
    <h1>所有文章</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">新建文章</a>

    @foreach ($posts as $post)
        <div class="border p-3 mb-3">
            <h3>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </h3>
            <p>{{ Str::limit($post->content, 100) }}</p>

            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-warning">编辑</a>

            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('确定要删除这篇文章吗？');">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">删除</button>
            </form>
        </div>
    @endforeach

    {{ $posts->links() }}
@endsection
