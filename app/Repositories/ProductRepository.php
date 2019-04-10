<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{
  public function __construct(Product $product){
    $this->product = $product;
    }

  public function getProduct()
  {
    return $this->product->get();
  }
  public function getByIdProduct($id)
  {
    return $this->product->query()->where('category_id', $id)->get();
  }
}
