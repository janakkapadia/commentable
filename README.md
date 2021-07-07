# Laravel Comment Package

### Package setup steps:

- Go to project root directory from terminal
- Run following commands:
  ```shell
  composer require janakkapadia/commentable
  php artisan vendor:publish --tag=comment-migrations
  php artisan migrate
  ```
- You need add trait in following model:
  ```shell
  use HasComments;
  ```

- Create Comment:
  ```shell
  $model->comments()->create([
      "comment" => "add content here"
  ]);