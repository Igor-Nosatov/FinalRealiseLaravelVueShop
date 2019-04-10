<?php

namespace App\Repositories;

use App\Cart;

class CartRepository
{
    protected $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }
    public function getCart()
    {
        return $this->cart->get();
    }

    public function createCart(array $data) : Cart
	  {
		    return $this->cart->create($data);
  	}

    public function deleteCart($id) : bool
	  {
		    return $this->cart->find($id)->delete();
  	}
}
