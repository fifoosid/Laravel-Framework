<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function main()
    {
        $user = auth::user();
        $message = [];

        return view('auth.main-info', compact(['user', 'message']));
    }

    public function password()
    {
        $user = auth::user();
        $messages = [];
        
        return view('auth.change-password', compact(['user', 'message']));
    }

    public function updatePassword(Request $request)
    {
        //TODO:
        $user = auth::user();
        
        $request->validate([
            'old-password' => 'required',
            'password' => 'required|confirmed'
        ]);

    }

    public function updateMain(Request $request)
    {
        $user = auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        $request->session()->flash('message', 'Task was successful!');
        return redirect()->back();
    }
}
