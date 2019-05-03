<?php

namespace App\Http\Controllers;

use App\Comment;
use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()){
            $comment = new Comment;
            $comment->body = $request->comment_body;
            $comment->user()->associate($request->user());
            $post = House::find($request->post_id);
            $post->comments()->save($comment);
            return back();
        }
        return redirect()->route("login");
    }

//    public function replyStore(Request $request)
//    {
//        if (Auth::check()){
//            $reply = new Comment();
//            $reply->body = $request->get('comment_body');
//            $reply->user()->associate($request->user());
//            $reply->parent_id = $request->get('comment_id');
//            $post = House::find($request->get('post_id'));
//            $post->comments()->save($reply);
//            return back();
//        }
//        return redirect()->route("login");
//
//    }
//    public function deleteWithReplies()
//    {
//        if (count($this->replies) > 0) {
//            foreach ($this->replies as $reply) {
//                $reply->deleteWithReplies();
//            }
//        }
//        $this->delete();
//    }
}
