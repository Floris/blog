<?php


namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;


class CommentController extends Controller
{

//    public function getComments($id)
//    {
//        $comments = Comment::
//        where('id', '=', $id)
//        ->orderBy('created_at', 'asc')->get();
//        return view('comments', ['comments' => $comments]);
//    }

    public function store(Request $request)
    {

        $comment = $request->validate([
            'comment' => 'required',
        ]);

        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = $request->user_id;
        $comment->page_id = $request->page_id;
        $comment->user_email = $request->user_email;
        $comment->reply_id = $request->reply_id;

        $comment->save();
        return back();

    }

    public function deleteComment($id){

        Comment::findOrFail($id)->delete();
        return redirect('dashboard/comments');

    }

    }