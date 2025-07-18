<?php

namespace App\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CommentsTree extends Component
{
    public $post;
    public $comments;

    protected $listeners = [
        'comment-added' => '$refresh',
    ];

    /**
     * @param $post
     * @return void
     */
    public function mount($post): void
    {
        $this->post = $post;
        $this->comments = $post->comments()
                               ->whereNull('parent_comment_id')
                               ->with('replies')
                               ->get();
    }

    /**
     * @return View|Application|Factory|\Illuminate\View\View
     */
    public function render(): View|Application|Factory|\Illuminate\View\View
    {
        return view('livewire.comments-tree');
    }
}
