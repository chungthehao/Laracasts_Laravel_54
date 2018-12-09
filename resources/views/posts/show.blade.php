@extends('layouts.master')

@section('main')
    <div class="col-md-8 blog-main">
        <h3>{{ $post->title }}</h3>

        @if (count($tags = $post->tags))
            <ul>
                @foreach ($tags as $tag)
                    <li>
                        <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a>
                    </li>
                @endforeach
            </ul>
        @endif

        {{ $post->body }}

        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                        &nbsp;
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>

        <hr>

        @include('layouts.errors')

        {{-- Add a Comment --}}
        <div class="card">
            <div class="card-body">
                <form action="/posts/{{ $post->id }}/comments" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" placeholder="Your Comment Here." cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Comment</button>
                </form>
            </div>
        </div>
    </div>
@endsection