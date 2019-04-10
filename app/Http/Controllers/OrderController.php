<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $data['order'] = $this->order->getOrder();
        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
      $order = $this->order->createOrder($request->all());
      return response()->json('success');
    }

    public function delete($id)
    {
        $order = $this->order->deleteOrder($id);
        return response()->json('success');
    }
}
