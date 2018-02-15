<div class="frame-comment">
    <div class="flex comment-border margin-bottom align-items">
        <span class="glyphicon glyphicon-comment"></span>
        <div class="container margin-left">
            <div class="comment-info-wrapper">
                <h5 >({{ $comment->created_at->diffForHumans() }})</h5>
                <h4 id="comment-created">{{ $comment->user->name }}:</h4>
            </div>
            <p class="comment">{{ $comment->body }}</p>
        </div>
    </div>
</div>