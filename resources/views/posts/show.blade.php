@extends('layouts.master')

@section('title', 'Show Post')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">{{ $post->title }}</h3>
            <p class="card-text">{{ $post->content }}</p>
        </div>
    </div>
    <div class="mb-4">
        <livewire:comment-form :post="$post"/>
    </div>
    <livewire:comments-tree :post="$post"/>
    <div class="mt-4">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete Post</button>
        </form>
    </div>
@endsection
