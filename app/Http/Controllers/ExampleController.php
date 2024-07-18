<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //  function login() {
    //     return view('login');
    // }

    //  function cv() {
    //     // logic
    //     return view('cv');
    // }

    function task3()
    {
        return view('task3');
    }
    public function store(Request $request)
    {

        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $data = ['name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message];
        return view('user_data', $data);
    }
}
