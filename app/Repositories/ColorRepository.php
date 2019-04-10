<?php

namespace App\Repositories;

use App\Color;

class ColorRepository
{
  public function __construct(Color $color)
    {
      $this->color = $color;
    }

  public function getColor()
   {
      return $this->color->get();
   }
}
