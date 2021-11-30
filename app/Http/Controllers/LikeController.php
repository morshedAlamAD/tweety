<?php

namespace App\Http\Controllers;

use App\Models\likes;
use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Tweet $tweet)
    {
        $tweet->liked();
        return back();
    }
    public function dislike(Tweet $tweet)
    {
        $tweet->disliked();
        return back();
    }
}
