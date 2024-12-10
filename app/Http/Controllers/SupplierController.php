<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';
        $suppliers = Supplier::search($search)->orderBy('id', 'desc')->paginate(10);
        return view('pages.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        //
        Supplier::create($request->validated());
        return redirect()->route('suppliers.index')->with('success', 'Supplier added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $supplier = Supplier::findOrFail($id);
        return view('pages.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        //
        $supplier->update($request->validated());
        return redirect()->route('supplier.index')->with('info', 'Supplier updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
        try {
            $supplier->delete();
            return back()->with('success', 'Supplier deleted successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->with('info', 'The supplier cannot be deleted because it is associated with products.');
        }
    }
}
