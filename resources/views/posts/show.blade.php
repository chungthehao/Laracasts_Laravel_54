@extends('layouts.master')

@section('main')
    <div class="col-md-8 blog-main">
        <h3>{{ $post->title }}</h3>

        {{ $post->body }}
    </div>
@endsection