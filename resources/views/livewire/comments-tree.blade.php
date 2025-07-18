<div class="comments-tree">
    @foreach($comments as $comment)
        @include('components.comment', ['comment' => $comment])
    @endforeach
</div>
