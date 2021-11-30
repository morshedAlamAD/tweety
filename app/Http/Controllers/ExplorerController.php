<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExplorerController extends Controller
{
    public function index(User $user)
    {
        $users=$user::all();
        return view('components.explorer', compact('users'));
    }
}
