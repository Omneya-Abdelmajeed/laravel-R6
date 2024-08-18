<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10|max:2000',
        ]);

        // $recipientEmail = $data['email'];
        
        // Mail::to($recipientEmail)->send(new ContactUs($data));

        Mail::to('omneya@example.com')->send(new ContactUs($data));
        return back()->with("success', 'Thank you for your message!");
    }
}
