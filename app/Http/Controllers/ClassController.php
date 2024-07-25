<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all classes from database
        //return view all classes
        //select * from classes is equ. to the following code:
        $classes = Course::get();

        return view('classes', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_class'); //show form name of blade file
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Makes conflict??
        // $request->validate([
        //     //required here is fore Server-Side validation
        //     'className' => 'required|string|max:100',
        //     'capacity' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'time_from' => 'required|date_format:H:i',
        //     'time_to' => 'required|date_format:H:i',
        //     'isFulled' => 'boolean',
        // ]);

        //Solution as Session_04:

        // $className = 'Mathematics';
        // $capacity = 15;
        // $price = 200;
        // $time_from = '07:30:00';
        // $time_to = '09:00:00';
        // $isFulled= true;

        //In order to store this data inside the database
        Course::create([
            'className' => $request->className,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'isFulled' => isset($request->isFulled),
            // 'isFulled' => $request->has('isFulled'),
        ]);
       // return "Data added Successfully";
       return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Course::findOrFail($id);
        return view('class_details', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Course::findOrFail($id);
        return view('edit_class', compact('class'));
        //return "This Class id is equal " . $id . "<br>And its name is: " . $class->className;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$request ==> data to be updated
        $data = [
            'className' => $request->className,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'time_from' => $request->time_from,
            'time_to' => $request->time_to,
            'isFulled' => isset($request->isFulled),
        ];
        Course::where('id', $id)->update($data);
        //return "Data updated successfully";
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return "delete page";
        //softDelete
        Course::where('id', $id)->delete();
        //return 'Data deleted successfully';
        return redirect()->route('classes.index');
    }
    public function showDeleted(){
        $classes = Course::onlyTrashed()->get();

        return view('trashedClasses', compact('classes'));
    }
}
