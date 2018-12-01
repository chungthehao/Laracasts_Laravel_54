@extends('layouts.master')

@section('main')
    <div class="col-md-8">
        <h3>Publish a Post</h3>

        <hr>

        <form action="{{ route('posts.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea name="body" id="body" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            {{--@php(dump($errors->messages()))--}}
            @include('layouts.errors')
        </form>
    </div>
@endsection