<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

  public function store(Request $request)
    {
       $review = new Review([
        'star' => $request->get('star'),
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'message' => $request->get('message'),
        'product_id' => $request->get('product_id'),
      ]);

      $review->save();

      return response()->json('success');
    }
}
