<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    // $post->comments
    public function comments()
    {
        return $this->hasMany('App\Comment'); // Comment::class
    }

    // $post->user->name
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
//        Cách 1
       /* Comment::create([
            'body' => $body,
            'post_id' => $this->id
        ]);*/

//       Cách 2: use the relationship
        $this->comments()->create(['body' => $body]);
    }

    public function scopeFilter($query, $filters)
    {
        if ($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month); // March => 3, May => 5
        }
        if ($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) AS year, monthname(created_at) as month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
