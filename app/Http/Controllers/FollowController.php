<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function post(User $user)
    {
        auth()->user()->follow($user);
        return back();
    }
}
