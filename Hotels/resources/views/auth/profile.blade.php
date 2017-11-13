@extends('layouts.layout')
@section('content')
    <h1>Profile</h1>
    <hr>

    <div class="profile-container">
    <button class="switch-buttons">Main Info</button>
    <button class="switch-buttons">Change Password</button>

        <form method="POST" action="/profile/update">
            <div class="main-info">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" required autofocus>
                </div>
            </div>

            <button class="btn btn-primary">Change Info</button>
            {{ csrf_field() }}
        </form>

        <form method="POST" action="/profile/update">
            <div class="password-info">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" required autofocus>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required autofocus>
                </div>
            </div>

            <button class="btn btn-danger">Change Password</button>
        </form>
    </div>
@endsection