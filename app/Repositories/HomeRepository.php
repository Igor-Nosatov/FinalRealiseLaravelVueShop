<?php

namespace App\Repositories;

use App\Product;

class HomeRepository
{
    public function __construct(Product $product){
      $this->product = $product;
      }

    public function getProduct()
    {
      return $this->product->take(8)->get();
    }
}
