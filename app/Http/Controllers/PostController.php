<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use DB;
use App\Tag;



class PostController extends Controller
{

    public function createPost(Request $request)
    {

//        $file = Request::file('file');git
//        $destinationPath = public_path().'/image/';
//        $filename = $file->getClientOriginalName();
//        $file->move($destinationPath, $filename);
//        echo url().'/image/'.$filename;

        $post = $request->validate([
            'title' => 'required',
            'post_content' => 'required|'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->draft = $request->draft;

        $aa = $request->tags;
        $post->post_content = $request->post_content;

        if ($aa != null) {
            $post->tags = implode(",", $aa);
        }

        $post->save();
        return redirect('/dashboard');
        //return back();

    }

    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
        Comment::where('page_id', $id)->delete();
        return redirect('/dashboard');
    }

    public function backToDraftPost($id)
    {
        Post::where('id', $id)
            ->update([
                'draft' => 1
            ]);
        return back();
    }


    public function editPost($id, Request $request)
    {

        $aa = $request->tags;

        if ($aa != null) {
            $request->tags = implode(",", $aa);
        }

        // Post::where('id', $id)
        //     ->update([
        //         'title' => $request->title,
        //         'post_content' => $request->post_content,
        //         'draft' => $request->draft,
        //         'tags' => $request->tags,
        //     ]);

        $post = Post::find($id);

        $post->title = $request->title;
        $post->post_content = $request->post_content;
        $post->draft = $request->draft;
        $post->tags = $request->tags;

        $post->save(); //this will UPDATE the record with id=$id

        return back();
    }


    public function getPost($id)
    {
        $post = Post::select('*')
            ->where('id', $id)
            ->orderBy('created_at', 'DESC')->get();

        $tags = Tag::get();

        return view('dash_post', [
            'post' => $post,
            'tags' => $tags
        ]);

    }

    public function getDraft($id)
    {
        $post = Post::select('*')
            ->where('id', $id)
            ->where('draft', 1)
            ->orderBy('created_at', 'DESC')->get();

        return view('dash_draft', ['post' => $post]);
    }

    public function previewPage($id)
    {
        $preview = Post::select('*')
            ->where('id', $id)
//            ->where('draft', 1)
            ->get();


        return view('preview', [
            'preview' => $preview,
        ]);
    }

    public function allDrafts()
    {
        $posts = Post::select('*')
            ->where('draft', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('dash_drafts', ['dash_posts' => $posts]);
    }


}
