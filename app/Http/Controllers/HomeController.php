<?php

namespace App\Http\Controllers;

use App\Repositories\HomeRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $product;

    public function __construct(HomeRepository $product)
    {
        $this->product = $product;
    }

    public function index()
	  {
	    	$data['products'] = $this->product->getProduct();
		    return response()->json($data, 200);
	   }
}
