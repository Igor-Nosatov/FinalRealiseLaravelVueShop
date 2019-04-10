<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\WishlistRepository;

class WishlistController extends Controller
{
	public function __construct(WishlistRepository $wishlist)
  {
      $this->wishlist = $wishlist;
  }

	public function index()
	{
			$data['wishlist'] = $this->wishlist->getWishlist();
			return response()->json($data, 200);
	}

	public function store(Request $request)
	{
		$this->wishlist->createWishlist($request->all());
		return response()->json('success');
	}

	public function delete($id)
	{
			$wishlist = $this->wishlist->deleteWishlist($id);
			return response()->json('success');
	}
}
