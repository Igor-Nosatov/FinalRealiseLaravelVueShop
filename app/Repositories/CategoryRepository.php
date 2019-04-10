<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{
  public function __construct(Category $category)
    {
      $this->category = $category;
    }

  public function getCategory()
   {
      return $this->category->get();
   }
}
