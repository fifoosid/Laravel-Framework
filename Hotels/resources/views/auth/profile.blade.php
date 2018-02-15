@extends('layouts.layout')
@section('content')
    <h1>Profile</h1>
    <hr>

    @include('layouts.success')
    @include('layouts.errors')

    <div class="profile-container">

        <div class="fluid-container flex">
            <div class="button-container">
                <a href="/profile/main">
                    <button class="switch-buttons">Main Info</button>
                </a>
                <a href="/profile/password">
                    <button class="switch-buttons">Change Password</button>
                </a>
            </div>

            <div id="change-image" class="image-wrapper flex ml-auto">
                <div class="avatar-wrapper">
                    <img src="{{ URL::to('/')}}/Images/change_image.png" alt="Change image">
                </div>
                <img class="profile-picture" src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
            </div>
        </div>

        @yield('info-to-update')
        
    </div>

@endsection