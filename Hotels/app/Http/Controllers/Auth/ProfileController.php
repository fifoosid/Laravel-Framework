<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth::user();

        return view('auth.profile', compact(['user']));
    }

    public function update()
    {
        return 3;
    }
}
