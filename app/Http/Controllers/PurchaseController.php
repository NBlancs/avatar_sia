<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Customer;
use App\Models\SmartLight;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::with(['customer', 'light'])->paginate(10);
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $lights = SmartLight::all();
        return view('purchases.create', compact('customers', 'lights'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'light_id' => 'required|exists:smart_lights,id',
            'quantity' => 'required|integer|min:1',
        ]);

        Purchase::create($request->all());
        
        return redirect()->route('purchases.index')
                        ->with('success', 'Purchase created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        return view('purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        $customers = Customer::all();
        $lights = SmartLight::all();
        return view('purchases.edit', compact('purchase', 'customers', 'lights'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'light_id' => 'required|exists:smart_lights,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $purchase->update($request->all());
        
        return redirect()->route('purchases.index')
                        ->with('success', 'Purchase updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        
        return redirect()->route('purchases.index')
                        ->with('success', 'Purchase deleted successfully');
    }
}
