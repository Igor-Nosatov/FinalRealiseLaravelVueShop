<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CheckoutRepository;

class CheckoutController extends Controller
{

    public function __construct(CheckoutRepository $checkout)
    {
        $this->checkout = $checkout;
    }

    public function store(Request $request)
    {
      $this->checkout->createCheckout($request->all());
      return response()->json('success');
    }
}
