<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\User;
use App\Models\Comment;
use App\Http\Requests\CreateCommentRequest;
class CommentsController extends Controller
{
    public function store(Team $team, CreateCommentRequest $request){
        $data = $request->validated();
        $user = auth()->user();
        $comment = new Comment;
        $comment->content = $data['content'];
        $comment->team()->associate($team);
        $comment->user()->associate($user);
        $comment->save();
        return redirect('/');
    }
}
