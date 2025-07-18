<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @return Factory|View|Application|\Illuminate\View\View|object
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * @param Post $post
     * @return Factory|View|Application|\Illuminate\View\View|object
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * @return Factory|View|Application|\Illuminate\View\View|object
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post and related comments deleted successfully!');
    }
}
