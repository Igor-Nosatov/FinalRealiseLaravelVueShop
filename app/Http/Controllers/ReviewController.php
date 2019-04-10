<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
  public function __construct(ReviewRepository $review)
  {
      $this->review = $review;
  }
  public function store(Request $request)
  {
    $this->review->createReview($request->all());
    return response()->json('success');
  }
}
