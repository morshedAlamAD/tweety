<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets=current_user()->timeline();
        return view('home', compact('tweets'));
    }
    public function store(Request $request, Tweet $tweet)
    {
        $post= $request->validate(['tweet'=> 'required']);
        $tweet->create([
            'user_id'=>auth()->id(),
            'tweet'=> $post['tweet']
        ]);
        return redirect('/tweets');
    }
}
