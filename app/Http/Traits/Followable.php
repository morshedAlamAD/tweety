<?php
namespace App\Http\Traits;

use App\Models\Tweet;
use App\Models\User;

trait Followable
{
    public function follow(User $user)
    {
        return $this->follows()->toggle($user);
    }
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function timeline()
    {
        $ids=$this->follows()->pluck('following_user_id');
        $ids->push($this->id);
        return Tweet::whereIn('user_id', $ids)->withLikes()->latest()->cursorPaginate(3);
    }
    public function following(User $user)
    {
        return  $this->follows()->where('following_user_id', $user->id)->first();
    }
}
