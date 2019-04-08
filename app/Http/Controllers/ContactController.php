<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function store(Request $request)
    {
       $contact = new Contact([
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'subject' => $request->get('subject'),
        'message' => $request->get('message'),
      ]);

      $contact->save();

      return response()->json('success');
    }
}
