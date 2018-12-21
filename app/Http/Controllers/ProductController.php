<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Jackson A. Chegenye
     * Display a listing of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5); // Fetch all products and paginate maximum 5
  
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5); // Append returned products array to view

        // dd(view('products.index',compact('products'))
        // ->with('i', (request()->input('page', 1) - 1) * 5));
    }

    /**
     * Jackson A. Chegenye
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Jackson A. Chegenye
     * Store a newly created products in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([ 
                'name' => 'required', 
                'detail' => 'required', 
            ]
        );

        Product::create($request->all());
   
        return redirect()->route('products.index')->with('success','Product created successfully.');

    }

    /**
     * Jackson A. Chegenye
     * Display the specified products.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Jackson A. Chegenye
     * Show the form for editing the specified products.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Jackson A. Chegenye
     * Update the specified products in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $product->update($request->all());
  
        return redirect()->route('products.index')->with('success','Product updated successfully');
    }

    /**
     * Jackson A. Chegenye
     * Remove the specified product from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
  
        return redirect()->route('products.index')->with('success','Product deleted successfully');
    }
}
