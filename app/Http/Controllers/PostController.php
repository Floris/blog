<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use DB;
use App\Tag;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{

    public function createPost(Request $request)
    {
        $post = $request->validate([
            'title' => 'required',
            'post_content' => 'required|'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->draft = $request->draft;
        $post_content = $request->post_content;

        $aa = $request->tags;

        if ($aa != null) {
            $post->tags = implode(",", $aa);
        }

        $dom = new \DomDocument();
        $dom->loadHtml($post_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach <img> in the submited post_content
        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "/images/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)// encode file to the specified mimetype
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-

        $post->post_content = $dom->saveHTML();
        $post->save();
        return redirect('/dashboard');


//        IMAGE UPLOAD FROM https://www.expertphp.in/article/laravel-summernote-editor-to-get-upload-file-image-url-instead-of-base64-intervention-image?utm_source=learninglaravel.net
    }

    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
        Comment::where('page_id', $id)->delete();
        return redirect('/dashboard');
    }

    public function deleteMultiplePosts(Request $request)
    {

        if (isset($request->make_draft)) {
            if (is_array($request->post_id_make_public)) {
                foreach ($request->post_id_make_public as $value) {
                    Post::where('id', $value)
                        ->update([
                            'draft' => 1
                        ]);
                }
            } else {
                Post::where('id', $request->post_id_make_public)
                    ->update([
                        'draft' => 1
                    ]);
            }
        }else{
            if (isset($request->post_id_make_public)) {
                if (is_array($request->post_id_make_public)) {
                    foreach ($request->post_id_make_public as $value) {
                        Post::where('id', $value)
                            ->update([
                                'draft' => NULL
                            ]);
                    }
                } else {
                    Post::where('id', $request->post_id_make_public)
                        ->update([
                            'draft' => NULL
                        ]);
                }
            }
        }

        if (isset($request->post_id_delete)) {
            if (is_array($request->post_id_delete)) {
                foreach ($request->post_id_delete as $value) {
                    Post::findOrFail($value)->delete();
                    Comment::where('page_id', $value)->delete();
//                debug
//                echo "DELETE::   " . $value;
                }
            } else {
                Post::findOrFail($request->post_id)->delete();
                Comment::where('page_id', $request->post_id)->delete();
            }
        }

        return back();
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

        $post = $request->validate([
            'title' => 'required',
            'post_content' => 'required|'
        ]);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->draft = $request->draft;
        $post_content = $request->post_content;

        $aa = $request->tags;

        if ($aa != null) {
            $post->tags = implode(",", $aa);
        }

        $dom = new \DomDocument();
        $dom->loadHtml($post_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        // foreach <img> in the submited post_content
        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // if the img source is 'data-url'
            if (preg_match('/data:image/', $src)) {
                // get the mimetype
                preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                $mimetype = $groups['mime'];
                // Generating a random filename
                $filename = uniqid();
                $filepath = "/images/$filename.$mimetype";
                // @see http://image.intervention.io/api/
                $image = Image::make($src)
                    // resize if required
                    /* ->resize(300, 200) */
                    ->encode($mimetype, 100)// encode file to the specified mimetype
                    ->save(public_path($filepath));
                $new_src = asset($filepath);
                $img->removeAttribute('src');
                $img->setAttribute('src', $new_src);
            } // <!--endif
        } // <!-

        $post->post_content = $dom->saveHTML();
        $post->save();
        return back();


//        IMAGE UPLOAD FROM https://www.expertphp.in/article/laravel-summernote-editor-to-get-upload-file-image-url-instead-of-base64-intervention-image?utm_source=learninglaravel.net
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
