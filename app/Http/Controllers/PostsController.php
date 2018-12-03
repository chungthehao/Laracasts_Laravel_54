<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
//        $posts = Post::latest();
//        $posts = Post::orderBy('created_at', 'desc')->get();
//        $posts = Post::all();

//        if ($month = request('month')) {
//            $posts->whereMonth('created_at', Carbon::parse($month)->month); // March => 3, May => 5
//        }
//        if ($year = request('year')) {
//            $posts->whereYear('created_at', $year);
//        }
//        $posts = $posts->get();

        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        $archives = Post::selectRaw('year(created_at) AS year, monthname(created_at) as month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        return view('posts.index', compact('posts', 'archives'));
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

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        /*auth()->user()->posts()->create(request(['title', 'body']));*/
        /*Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);*/

        // And then redirect to the home page
        return redirect('/');
    }

    public function show(Post $post)
    {
//        $post = Post::find($post);

        return view('posts.show', compact('post'));
    }
}
