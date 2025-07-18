<div class="mb-3" style="margin-left: {{ ($comment->depth - 1) * 20 }}px;">
    <div class="card">
        <div class="card-body p-2">
            <p class="mb-1">{{ $comment->content }}</p>
            @if($comment->canReply())
                <livewire:comment-form :post="$comment->post" :parent="$comment" :key="'form-'.$comment->id"/>
            @endif
            @foreach($comment->replies as $reply)
                @include('components.comment', ['comment' => $reply])
            @endforeach
        </div>
    </div>
</div>
