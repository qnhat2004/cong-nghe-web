<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        // Get all products
        return view("products.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
        $products = Product::all();
        return view('products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
           
            'category' => 'required|string|max:255',
            'image_url' => 'required_if:image_option,url|url',
            'image_file' => 'required_if:image_option,upload|file',
            'rating_rate' => 'required|numeric',
            'rating_count' => 'required|numeric',
        ]);

        // Create a new product
        $product = new Product();
        $product->title = $validatedData['title'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        $product->category = $validatedData['category'];

        if ($request['image_option'] === 'url') {
            $product->image = $validatedData['image_url'];
        } else {
            $fileName = time() . '_' . $request->file('image_file')->getClientOriginalName();
            $filePath = $request->file('image_file')->storeAs('public/images', $fileName);
            $product->image = 'storage/images/' . $fileName;
        }

        $product->rating_rate = $validatedData['rating_rate'];
        $product->rating_count = $validatedData['rating_count'];
          
        $product->save();

        // Redirect or return response
        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description'=> 'required|string|max:255',
            'category'=> 'required|string|max:255',
            'rating_rate' => 'required|numeric',
            'rating_count' => 'required|numeric',
        ]);

        // handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->file('image')->getClientOriginalExtension();
            $filePath = $request->file('image')->storeAs('public/images', $imageName);
            $product->image = 'images/'. $imageName;
        }

        // update the product
        $product->update([
            'title' => $request->title,
            'price'=> $request->price,
            'description'=> $request->description,
            'category'=> $request->category,
            'image' => $product->image ?? $product->image, // Keep the old image if no new image is uploaded
            'rating_rate' => $request->rating_rate,
            'rating_count' => $request->rating_count,
        ]);

        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
