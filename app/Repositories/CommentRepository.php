<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository
{
  public function __construct(Comment $comment)
  {
      $this->comment = $comment;
  }
  public function getComment()
  {
      return $this->comment->get();
  }
  public function createComment(array $data):Comment
  {
      return $this->comment->create($data);
  }
}
