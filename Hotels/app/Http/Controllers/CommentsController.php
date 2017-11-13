<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function add(Request $request)
    {
        //Get the hotel id
        $url = url()->previous();
        $hotelId = explode('/' ,$url);
        
        //Build comment
        $comment = new Comment;

        $comment->body = $request->body;
        $comment->user_id = auth::user()->id;
        $comment->hotel_id = $hotelId[count($hotelId) - 1];

        // dd($comment);
        $comment->save();
        

        return redirect()->back();
    }
}
