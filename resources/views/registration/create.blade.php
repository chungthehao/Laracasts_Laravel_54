@extends('layouts.master')

@section('main')
    <div class="col-md-8">
        <h1>Register</h1>

        <hr>

        @include('layouts.errors')

        <form action="/register" method="post">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection