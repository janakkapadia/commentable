<?php
namespace JanakKapadia\Commentable\Traits;

use JanakKapadia\Commentable\Comment;

trait HasComments
{
    public static function bootCommentable() {
        self::creating(function ($model){
            $model->user = config('auth.providers.users.model');
        });
        self::deleting(function ($model){
            $model->comments->each->delete();
        });
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}