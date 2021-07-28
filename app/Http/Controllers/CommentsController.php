<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\CreateCommentRequest;
class CommentsController extends Controller
{
    public function store(Team $team,User $user, CreateCommentRequest $request){
        $data = $request->validated(); 
        $comment = new Comment;
      
        $comment->post()->associate($team);
        $comment->user()->associate($user);
        $comment->save();
        return redirect('/');

    }
}
