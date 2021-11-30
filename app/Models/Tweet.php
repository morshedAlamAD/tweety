<?php

namespace App\Models;

use App\Http\Traits\likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class Tweet extends Model
{
    use likeable;
    protected $guarded = [];
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function liked()
    {
        $this->likes()->updateOrCreate(
            [
            'user_id'=> Auth::id()
        ],
            [
            'like'=>true
        ]
        );
    }
    public function disliked()
    {
        $this->likes()->updateOrCreate(
            [
            'user_id'=> Auth::id()
            ],
            [
            'like'=>false
            ]
        );
    }
}
