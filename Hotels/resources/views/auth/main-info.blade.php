@extends('auth.profile')
@section('info-to-update')

    <form method="POST" action="/profile/updateMain">
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

@endsection