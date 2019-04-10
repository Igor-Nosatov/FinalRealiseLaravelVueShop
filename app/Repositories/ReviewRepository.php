<?php

namespace App\Repositories;

use App\Review;

class ReviewRepository 
{
  public function __construct(Review $review)
  {
      $this->review = $review;
  }
  public function getReview()
  {
      return $this->review->get();
  }
  public function createReview(array $data):Review
  {
      return $this->review->create($data);
  }
}
