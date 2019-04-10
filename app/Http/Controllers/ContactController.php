<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ContactRepository;

class ContactController extends Controller
{
  public function __construct(ContactRepository $contact)
  {
      $this->contact = $contact;
  }

  public function store(Request $request)
  {
    $this->contact->createContact($request->all());
    return response()->json('success');
  }
  
}
