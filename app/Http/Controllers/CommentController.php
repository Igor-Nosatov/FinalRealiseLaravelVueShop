<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;

class CommentController extends Controller
{
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }
    public function store(Request $request)
    {
      $this->comment->createComment($request->all());
      return response()->json('success');
    }
}
