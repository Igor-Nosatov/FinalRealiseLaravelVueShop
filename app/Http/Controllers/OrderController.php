<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

  public function index()
  {
    $data['order'] = Order::query()->get();
    return response()->json($data,200);
  }

  public function store(Request $request)
    {
       $order = new Order([
        'name' => $request->get('name'),
        'price' => $request->get('price'),
        'qty' => $request->get('qty'),
      ]);

      $order->save();

      return response()->json('success');
    }

    public function delete($id)
    {
      $order = Order::find($id);

      $order->delete();

      return response()->json('successfully deleted');
    }

}
