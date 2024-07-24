<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all cars from database
        //return view all cars
        //select * from cars by the following code:
        $cars = Car::get();

        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_car');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //    // dd($request);
        //    $carTitle = 'BMW';
        //    $price = 12;
        //    $description = "test";
        //    $published = true;

        //    Car::create([
        //         'carTitle' => $carTitle,
        //         'price' => $price,
        //         'description' => $description,
        //         'published' => $published,
        //    ]);

        //session_05
        // if(isset($request->published)) {
        //     $pub = true;
        // } else {
        //     $pub = false;
        // }
        Car::create([
            //'key' => 'value'
            'carTitle' => $request->carTitle,
            'description' => $request->description,
            'price' => $request->price,
            'published' => isset($request->published),
        ]);
        // return "Data added Successfully";
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = car::findOrFail($id);
        return view('car_details', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        //return "Car id = " . $id;
        $car = Car::findOrFail($id);
        return view('edit_car', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request, $id);
        //$request ==> data to be updated
        //$id
        $data = [
            'carTitle' => $request->carTitle,
            'description' => $request->description,
            'price' => $request->price,
            'published' => isset($request->published),
        ];
        Car::where('id', $id)->update($data);

        // return "data updated successfully";
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //return'delete page';
        //softDelete
        Car::where('id', $id)->delete();
       // return 'Data deleted successfully';
        return redirect()->route('cars.index');

    }
    public function showDeleted(){
        $cars = Car::onlyTrashed()->get();

        return view('trashedCars', compact('cars'));
    }
}
