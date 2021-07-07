<?php

namespace JanakKapadia\Commentable;

use Exception;
use Illuminate\Database\Eloquent\Model;
use JanakKapadia\Commentable\Traits\HasComments;

class Comment extends Model {
    use HasComments;
    
    protected $fillable = [
        'comment',
        'user_id'
    ];

    protected $with = ['user'];

    protected static function boot()
    {
        self::creating(function ($comment) {
            if (auth()->check()) {
                $comment->user_id = auth()->id();
            }
        });
    }

    public function commentable()
    {
        return $this->morphTo();
    }

    public function commentator()
    {
        return $this->belongsTo($this->getAuthModelName(), 'user_id');
    }

    public function user($configKey = 'auth.providers.users.model'): BelongsTo
    {
        return $this->belongsTo(config()->get($configKey));
    }
}