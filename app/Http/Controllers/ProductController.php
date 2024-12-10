<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';
        $filter_category = $request->input('category_id') ?? '';

        $products = Product::search($search ?: $filter_category)->orderBy('id', 'desc')->paginate(10);
        $categories = Category::select('id', 'name')->get();
        return view('pages.product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $suppliers = Supplier::select('id', 'name')->get();
        return view('pages.product.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'images/products/';
            $filename = 'PROD_IMG_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $filename);
            $validatedData['image'] = $filename;
        }

        Product::create($validatedData);
        session()->flash('success', 'Product added successfully.');
        return redirect()->route('product.index');
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
        $product = Product::findOrFail($id);
        $categories = Category::select('id', 'name')->get();
        $suppliers = Supplier::select('id', 'name')->get();
        return view('pages.product.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            $path = 'images/products/';
            $image = $request->file('image');
            $filename = 'PROD_IMG_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path($path), $filename);

            if ($product->image && file_exists(public_path($path . $product->image))) {
                unlink(public_path($path . $product->image));
            }
            $validatedData['image'] = $filename;
        }
        $product->update($validatedData);

        session()->flash('info', 'Product updated successfully.');
        return redirect()->route('product.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->sale_detail()->delete();
        $product->delete();
        return back()->with('success', 'Product deleted successfully.');
    }
}