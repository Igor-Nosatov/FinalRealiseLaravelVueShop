<?php

namespace App\Repositories;

use App\Wishlist;

class WishlistRepository 
{
  protected $wishlist;

  public function __construct(Wishlist $wishlist)
  {
      $this->wishlist = $wishlist;
  }
  public function getWishlist()
  {
      return $this->wishlist->get();
  }

  public function createWishlist(array $data) : Wishlist
  {
      return $this->wishlist->create($data);
  }

  public function deleteWishlist($id) : bool
  {
      return $this->wishlist->find($id)->delete();
  }
}
