<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = ['name', 'new_price',
     'old_price', 'description', 'image',
     'category_id','brand_id', 'color_id'];

  public function category()
  {
    return $this->belongsTo('App\Category');
  }
  public function brand()
  {
    return $this->belongsTo('App\Brand', 'brand_id');
  }
  public function color()
  {
    return $this->belongsTo('App\Color', 'color_id');
  }

  public function review()
  {
    return $this->hasMany('App\Review', 'review_id');
  }

  public function comment()
  {
    return $this->hasMany('App\Comment');
  }

}
