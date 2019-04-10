<?php

namespace App\Repositories;

use App\Order;

class OrderRepository
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    public function getOrder()
    {
        return $this->order->get();
    }

    public function createOrder(array $data) : Order
	  {
		    return $this->order->create($data);
  	}

    public function deleteOrder($id) : bool
	  {
		    return $this->order->find($id)->delete();
  	}
}
