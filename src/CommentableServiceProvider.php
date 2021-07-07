<?php
namespace JanakKapadia\Commentable;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider {

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_comments_table.php.stub' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_comments_table.php'),
        ], 'comment-migrations');
    }
}
