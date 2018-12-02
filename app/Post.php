<?php

namespace App;

class Post extends Model
{
    // $post->comments
    public function comments()
    {
        return $this->hasMany('App\Comment'); // Comment::class
    }

    public function addComment($body)
    {
//        Cách 1
       /* Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);*/

//       Cách 2
        $this->comments()->create(['body' => $body]);
    }
}
