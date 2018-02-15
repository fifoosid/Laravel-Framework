@extends('auth.profile')
@section('info-to-update')

    <form method="POST" action="/profile/updatePassword">

        <div class="password-info">
            <div class="form-group">
                <label for="old-password">Old password</label>
                <input type="password" name="old-password" class="form-control" required autofocus>
            </div>
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
        {{ csrf_field() }}

    </form>

@endsection








    