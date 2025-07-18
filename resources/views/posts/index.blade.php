@extends('layouts.master')

@section('title', 'Posts')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h1 class="mb-4">All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-success mb-3">Create New Post</a>
    <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item">
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection
