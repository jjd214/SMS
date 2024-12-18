<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Product;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\SaleDetail;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sales = Sale::orderBy('desc')->paginate(10);
        return view('pages.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        $customers = Customer::all();
        return view('pages.sale.create', compact('products', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        //
        $request->validated();
        $sale = Sale::create($request->all());
        if ($sale) {
            $sale_detail = new SaleDetail($request->all());
            $sale->sale_detail()->save($sale_detail);
            $payment_detail = new Payment($request->all());
            $sale->payment()->save($payment_detail);
        }
        return redirect()->route('sale.index')->with('success', 'Sales added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $sale = Sale::findOrFail($id);
        return view('pages.sale.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
