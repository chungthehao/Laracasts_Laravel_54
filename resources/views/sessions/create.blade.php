@extends('layouts.master')

@section('main')
    <div class="col-md-8">
        <h1>Sign In</h1>

        <hr>

        @include('layouts.errors')

        <form action="/login" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection