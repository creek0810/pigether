<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Comment;

class CommentController extends Controller
{
    public function add(Request $request) {
        /* args */
        $comment_account = Auth::id();
        $commented_account = $request->input('account');
        $content = $request->input("content");
        $score = $request->input("score");
        /* check if exists */
        $comment = Comment::where('comment_account', $comment_account)->where('commented_account', $commented_account);
        if($comment->first() == NULL) {
            $tmpComment = new Comment;
            $tmpComment->comment_account = $comment_account;
            $tmpComment->commented_account = $commented_account;
            $tmpComment->content = $content;
            $tmpComment->score = $score;
            $tmpComment->save();
        } else {
            $comment->update([
                'content' => $content,
                'score' => $score
            ]);
        }
        return redirect('/pigether/user/'.$request->input("account"));
    }
}
