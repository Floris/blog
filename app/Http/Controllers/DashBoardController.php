<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Tag;
use DB;
use App\User;
use Symfony\Component\Console\Tests\Output\NullOutputTest;

class DashBoardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {


        $posts = Post::select('*')
            ->where('draft', NULL)
            ->count();

        $drafts = Post::select('*')
            ->where('draft', '!=', NULL)
            ->count();

        $comments = Comment::count();

        $recent_posts = Post::
        select('*')
            ->orderBy('created_at', 'DESC')
            ->where('draft', null)
            ->LIMIT(3)
            ->get();

        $recent_comments = Comment::
        select('*')
            ->orderBy('created_at', 'DESC')
            ->LIMIT(3)
            ->get();

        return view('dashboard',
            ['post' => $posts,
                'draft' => $drafts,
                'comments' => $comments,
                'recent_posts' => $recent_posts,
                'recent_comments' => $recent_comments,
            ]);
    }

    public function getPosts()
    {
        $posts = Post::orderBy('created_at', 'DESC')
            ->where('draft', null)
            ->get();

        return view('dash_posts', ['dash_posts' => $posts]);
    }

    public function create()
    {

        $tags = Tag::get();

        return view('dash_create', [
            'tags' => $tags,
        ]);
    }

    public function getComments()
    {

        $comments = Comment::orderBy('created_at', 'DESC')->get();

        return view('dash_comments',
            [
                'comments' => $comments,
            ]);

    }

    public function getUsers(){

        $user = User::get();

        return view('users',[
            'users' => $user
        ]);
    }
}