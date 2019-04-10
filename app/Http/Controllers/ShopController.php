<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use App\Repositories\ColorRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
	protected $product;
	protected $color;
	protected $brand;
	protected $category;

	public function __construct(ProductRepository $product, ColorRepository $color, BrandRepository $brand, CategoryRepository $category)
	{
			$this->product = $product;
			$this->color = $color;
			$this->brand = $brand;
			$this->category = $category;
	}

	public function index()
	{
		$data['products'] = $this->product->getProduct();
		$data['colors'] = $this->color->getColor();
		$data['brands'] = $this->brand->getBrand();
		$data['categories'] = $this->category->getCategory();
		return response()->json($data, 200);
	}
	public function search(){
		$data['products'] = $this->product->getProduct();
		$data['colors'] = $this->color->getColor();
		$data['brands'] = $this->brand->getBrand();
		$data['categories'] = $this->category->getCategory();
		return response()->json($data, 200);
	}
	public function category($id)
	{
		$data['products'] = $this->product->getByIdProduct($id);
		$data['colors'] = $this->color->getColor();
		$data['brands'] = $this->brand->getBrand();
		$data['categories'] = $this->category->getCategory();
		return response()->json($data, 200);
	}
}
