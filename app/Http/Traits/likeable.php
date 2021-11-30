<?php
namespace App\Http\Traits;

use App\Models\likes;
use App\Models\Tweet;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

trait likeable
{
    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            "SELECT tweets_id, COUNT('like')likeings, COUNT('!like') dislikeings FROM likes group BY tweets_id",
            'likes',
            'likes.tweets_id',
            'tweets.id'
        );
    }
    public function likes()
    {
        return $this->hasMany(likes::class, 'tweets_id');
    }
}
