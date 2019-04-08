<?php

namespace App\Http\Controllers;

use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request)
    {
      $comment = new Comment([
       'name' => $request->get('name'),
       'email' => $request->get('email'),
       'phone' => $request->get('phone'),
       'message' => $request->get('message'),
       'product_id' => $request->get('product_id'),

     ]);

     $comment->save();

     return response()->json('success');
    }


}
