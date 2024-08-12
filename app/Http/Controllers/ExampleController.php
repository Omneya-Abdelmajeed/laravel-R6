<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ExampleController extends Controller
{
    //  function login() {
    //     return view('login');
    // }

    //  function receive(Request $request){
    //  return $request->email . '<br>' . $request->pwd;    
    //  } 

    //  function cv() {
    //     // logic
    //     return view('cv');
    // }

    function task3()
    {
        return view('task3');
    }
    function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;

        $data = ['name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message];
        return view('user_data', $data);
    }
    function uploadForm() {
        return view('upload');
    }

    public function upload(Request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);
        return 'Uploaded';
    }
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function test() {
        // dd(Student::find(2), Student::find(2)->phone);
        // dd(Student::find(2)->phone->phone_number);
        dd( DB::table('students')
        ->join('phones', 'phones.id', '=', 'students.phone_id')
        ->where('students.id', '=', 1)
        ->first());
    }
}
