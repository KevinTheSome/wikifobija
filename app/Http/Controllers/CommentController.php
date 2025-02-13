<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
class CommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'comment' => 'required|string|min:0'
        ]);
        $comment = new Comment();
        $comment->phobia_id = $request->phobia_id;
        $comment->user_id = $request->user()->id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('phobia.show', $request->phobia_id);
    }

}
