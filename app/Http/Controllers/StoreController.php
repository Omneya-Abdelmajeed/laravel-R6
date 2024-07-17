<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
  function store(Request $request)
  {

      $name = $request->input('name');
      $email = $request->input('email');
      $subject = $request->input('subject');
      $message = $request->input('message');

      $data = ['name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message];
      return view('user_data', $data);
  }
}