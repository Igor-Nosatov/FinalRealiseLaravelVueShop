<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  protected $table = 'cart';

  protected $fillable = [
      'name', 'image', 'price', 'qty', 'user_id'
  ];

  public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

}
