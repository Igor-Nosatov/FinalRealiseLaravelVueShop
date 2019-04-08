<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Color;
use App\Brand;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
	{
		$data['products'] = Product::get();
		$data['categories'] = Category::get();
		$data['colors'] = Color::get();
		$data['brands'] = Brand::get();
		return response()->json($data, 200);
	}
}
