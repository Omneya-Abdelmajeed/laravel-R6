<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $data = $request->validate([
            //'key' => 'value'
            'carTitle' => 'required|string|regex:/^[A-Za-z]/', //using regex: to force the user that string must start with letter
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'published' => 'boolean',
        ], ['carTitle.regex' => 'the carTitle field must begin with a letter.']); //Custom Error Message 

        $data['published'] = isset($request->published);
        
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;
        $path = 'assets/images';
        $request->image->move($path, $file_name);

        $data['image'] = $file_name;

        //dd($data);

        Car::create($data);
        // return "Data added Successfully";
        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
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
        $data = $request->validate([
            'carTitle' => 'required|string',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $car = Car::findOrFail($id);

        if ($request->hasFile('image')) {

            $oldImagePath = public_path('assets/images/' . $car->image);

            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $file_extension = $request->image->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;
            $path = 'assets/images';
            $request->image->move($path, $file_name);
            $data['image'] = $file_name;

        }
        
        //dd($data);
        Car::where('id', $id)->update($data);

        // $data = [
        //     'carTitle' => $request->carTitle,
        //     'description' => $request->description,
        //     'price' => $request->price,
        //     'published' => isset($request->published),
        // ];
        // Car::where('id', $id)->update($data);

        // return "data updated successfully";
        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //return'delete page';
        //softDelete
        Car::where('id', $id)->delete();
        // return 'Data deleted successfully';
        return redirect()->route('cars.index');

    }
    public function showDeleted()
    {
        $cars = Car::onlyTrashed()->get();

        return view('trashedCars', compact('cars'));
    }

    public function restore(string $id)
    {
        Car::where('id', $id)->restore();
        return redirect()->route('cars.showDeleted');
    }

    public function forceDelete(string $id)
    {
        Car::where('id', $id)->forceDelete();
        return redirect()->route('cars.index');

    }
}
