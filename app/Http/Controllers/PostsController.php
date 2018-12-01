<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
//        $posts = Post::orderBy('created_at', 'desc')->get();
//        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        /* Validate */
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
        ]);

        # Cách 1
         /* Create a new post using the request data */
//        $post = new \App\Post;
//        $post->title = request('title');
//        $post->body = request('body');

         /* Save it to the database */
//        $post->save();

        /* Laravel prevent this case: */
//        Post::create(request()->all()); !!! DANGER !!!

        # Cách 2
//        Post::create([
//            'title' => request('title'),
//            'body' => request('body')
//        ]);
        // or
        Post::create(request(['title', 'body']));

        // And then redirect to the home page
        return redirect('/');
    }

    public function show(Post $post)
    {
//        $post = Post::find($post);

        return view('posts.show', compact('post'));
    }
}
