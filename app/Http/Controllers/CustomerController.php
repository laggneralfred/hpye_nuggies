<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of the customers.
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // Show the form for creating a new customer.
    public function create()
    {
        return view('customers.create');
    }

    // Store a newly created customer in storage.
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'nullable|string|max:255|unique:customers,customer_id',
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'total_base_points' => 'nullable|integer|min:0',
            'total_redeemable_points' => 'nullable|integer|min:0',
            'loyalty_tier' => 'nullable|string|max:255',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Display the specified customer.
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    // Show the form for editing the specified customer.
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Update the specified customer in storage.
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'customer_id' => 'nullable|string|max:255|unique:customers,customer_id,' . $customer->id,
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:customers,email,' . $customer->id,
            'phone' => 'nullable|string|max:20',
            'total_base_points' => 'nullable|integer|min:0',
            'total_redeemable_points' => 'nullable|integer|min:0',
            'loyalty_tier' => 'nullable|string|max:255',
        ]);
        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Remove the specified customer from storage.
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
