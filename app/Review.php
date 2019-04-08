<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = ['star', 'name',
       'email', 'phone', 'message', 'product_id', 'user_id'];

    public function product()
       {
         return $this->belongsTo('App\Product', 'product_id');
       }

       public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

}
