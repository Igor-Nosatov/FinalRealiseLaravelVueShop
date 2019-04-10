<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $data['cart'] = $this->cart->getCart();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
      $this->cart->createCart($request->all());
      return response()->json('success');
    }

    public function delete($id)
    {
        $cart = $this->cart->deleteCart($id);
        return response()->json('success');
    }
}
