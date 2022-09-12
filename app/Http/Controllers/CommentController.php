<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $validator = validator(request()->all(), [
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->article_id = $request->article_id;
        $comment->save();
        return back()->with('success', 'You are successfully judgement in this articles!');
    }

    public function destroy(Comment $comment)
    {
        if (Gate::denies('comment-delete', $comment)) {
            return back()->with('error', 'Unauthorized');
        }
        $comment->delete();
        return back();
    }
}
