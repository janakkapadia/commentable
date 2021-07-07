<?php
namespace JanakKapadia\Commentable\Traits;

use Illuminate\Database\Eloquent\Model;
use JanakKapadia\Commentable\Comment;

trait HasComments
{
    public static function bootCommentable() {
        self::deleting(function ($model){
            $model->comments->each->delete();
        });
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function user($configKey = 'auth.providers.users.model')
    {
        return $this->belongsTo(config()->get($configKey));
    }
}