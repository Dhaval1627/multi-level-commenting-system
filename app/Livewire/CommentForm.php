<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CommentForm extends Component
{
    public $post;
    public $parent;
    public $content;

    protected $rules = [
        'content' => 'required|string|max:500',
    ];

    /**
     * @return void
     */
    public function submit(): void
    {
        $this->validate();

        $depth = $this->parent ? $this->parent->depth + 1 : 1;

        if ($depth > Comment::getMaxDepth()) {
            $this->addError('content', 'Cannot reply beyond level ' . Comment::getMaxDepth());
            return;
        }

        Comment::create([
            'post_id' => $this->post->id,
            'parent_comment_id' => $this->parent?->id,
            'content' => $this->content,
            'depth' => $depth,
        ]);

        $this->content = '';

        $this->dispatch('comment-added');
    }

    /**
     * @return View|Application|Factory|\Illuminate\View\View
     */
    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        return view('livewire.comment-form');
    }
}
