<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
  protected $table = 'checkout';

  protected $fillable = [
    'firstname', 'lastname','company', 'phone', 'email',
    'country', 'adressone', 'adresstwo','city',
    'district', 'postcode','total', 'user_id'
  ];

  public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

}
