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

    public function commentable()
    {
        return $this->morphTo();
    }

    public function commentator()
    {
        return $this->belongsTo($this->getAuthModelName(), 'user_id');
    }

    protected function getAuthModelName()
    {
        if (!is_null(config('auth.providers.users.model'))) {
            return config('auth.providers.users.model');
        }

        throw new Exception('Could not determine the commentator model name.');
    }
}