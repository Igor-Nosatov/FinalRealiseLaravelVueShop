<?php

namespace App\Http\Controllers;

use App\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
  public function store(Request $request)
    {
       $checkout = new Checkout([
         'firstname'   => $request->get('firstname'),
         'lastname'    => $request->get('lastname'),
         'company'     => $request->get('company'),
         'phone'       => $request->get('phone'),
         'email'       => $request->get('email'),
         'country'     => $request->get('country'),
         'adressone'   => $request->get('adressone'),
         'adresstwo'   => $request->get('adresstwo'),
         'city'        => $request->get('city'),
         'district'    => $request->get('district'),
         'postcode'    => $request->get('postcode'),
         'total'       => $request->get('total'),

      ]);
      $checkout->save();
      return response()->json('success');
    }
}
