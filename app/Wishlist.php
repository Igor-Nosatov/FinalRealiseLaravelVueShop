<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

  protected $table = 'wishlist';

  protected $fillable = [
      'name', 'image', 'price', 'qty', 'user_id'
  ];
}
