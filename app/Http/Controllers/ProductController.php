<?php

    namespace App\Http\Controllers;

    use App\Product;
    use App\Comment;
    use App\Review;

    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        public function index()
        {
            return response()->json(Product::all(),200);
        }

        public function show($id)
        {
            $data['product'] = Product::query()->with('category')->find($id);
            $data['comment'] = Comment::query()->where('product_id', '=', $id)->limit(5)->get();
            $data['review'] = Review::query()->where('product_id', '=', $id)->get();
            return response()->json($data,200);
        }
    }
