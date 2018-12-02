<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);

        # Cách 1
        /*Comment::create([
            'body' => request('body'),
            'post_id' => $post->id
        ]);*/

        # Cách 2
        $post->addComment(request('body'));

        return back();
    }
}
