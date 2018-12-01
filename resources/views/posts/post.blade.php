<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{ $post->id }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">
        {{ $post->updated_at->toFormattedDateString() }} by <a href="#">Jacob</a>
    </p>

    {{ $post->body }}
</div><!-- /.blog-post -->