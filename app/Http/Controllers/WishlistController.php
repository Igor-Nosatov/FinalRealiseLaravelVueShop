<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

	public function index()
  {
		$data['wishlist'] = Wishlist::query()->get();
		return response()->json($data,200);
	}

	public function store(Request $request)
		{
			 $wishlist = new Wishlist([
				'name' => $request->get('name'),
				'image' => $request->get('image'),
				'price' => $request->get('price'),
				'qty' => $request->get('qty'),
			]);

			$wishlist->save();

			return response()->json('success');
		}

		public function delete($id)
    {
      $wishlist = Wishlist::find($id);

      $wishlist->delete();

      return response()->json('successfully deleted');
    }
}
