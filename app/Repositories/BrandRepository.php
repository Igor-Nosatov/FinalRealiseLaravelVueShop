<?php

namespace App\Repositories;

use App\Brand;

class BrandRepository
{
  public function __construct(Brand $brand)
    {
      $this->brand = $brand;
    }

  public function getBrand()
   {
      return $this->brand->get();
   }
}
