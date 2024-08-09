<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\Common;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::get();

        return view('products', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'shortDescription' => 'required|string|max:500',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data['image'] = $this->uploadFile($request->image, 'assets/images/product');
        // dd($data);
        Product::create($data);
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
        $product = Product::findOrFail($id);
        return view('edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'shortDescription' => 'required|string|max:500',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->image, 'assets/images/product');
        }
        Product::where('id', $id)->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function home()
    {
        // $products = Product::get();
        //dd($products);
        //1st solution
        //$products = Product::orderByDesc('created_at')->skip(0)->take(3)->get();

        //2nd solution as the 1st one
        //$products = Product::latest()->take(3)->get();

        //3rd soln.
        $latestProductsDesc = Product::latest()->take(3)->get();
        $products = $latestProductsDesc->sortBy('created_at');

        return view('index', compact('products'));
    }
}
