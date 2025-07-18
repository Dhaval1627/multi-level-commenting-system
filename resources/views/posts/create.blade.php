@extends('layouts.master')

@section('title', 'Create Post')

@section('content')
    <h1 class="mb-4">Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control">{{ old('content') }}</textarea>
            @error('content')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
