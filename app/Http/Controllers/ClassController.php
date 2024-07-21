<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
        //required here is fore Server-Side validation
        'className' => 'required|string|max:100',
        'capacity' => 'required|integer',
        'price' => 'required|numeric',
        'time_from' => 'required|date_format:H:i',
        'time_to' => 'required|date_format:H:i',
        'isFulled' => 'boolean',
        ]);

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
            'isFulled' => $request->has('isFulled'),
        ]);
        return "Data added Successfully";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
