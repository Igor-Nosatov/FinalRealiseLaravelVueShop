<?php

namespace App\Repositories;

use App\Contact;

class ContactRepository
{
  public function __construct(Contact $contact)
  {
      $this->contact = $contact;
  }

  public function createContact(array $data):Contact
  {
      return $this->contact->create($data);
  }
}
