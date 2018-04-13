<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC')
            ->where('draft', NULL)
            ->paginate(3);

        return view('home', ['home_posts' => $posts]);
    }

    public function update(Request $request)
    {

        $contact = Post::find($request->get('id'));
        $contact->title = $request->get('title');
        $contact->update(); //  <== will trigger HTTP call to Algolia
        //      after the model is saved in DB

    }

    public function post($id)
    {
        $post = Post::select('*')
            ->where('id', $id)
            ->where('draft', NULL)
            ->get();

        $comments = DB::table('comments')
            ->select('*')
            ->where('reply_id', '=', NULL)
            ->where('page_id', '=', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('post', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }

}

