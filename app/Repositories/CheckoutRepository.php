<?php

namespace App\Repositories;

use App\Checkout;

class CheckoutRepository
{
  public function __construct(Checkout $checkout)
  {
      $this->checkout = $checkout;
  }
  public function getCheckout()
  {
      return $this->checkout->get();
  }
  public function createCheckout(array $data):Checkout
  {
      return $this->checkout->create($data);
  }
}
