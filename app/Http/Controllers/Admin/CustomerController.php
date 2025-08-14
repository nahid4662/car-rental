<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // Display a listing of customers
    public function index()
    {
        $customers = \App\Models\User::where('role', 'customer')->get();
        return view('admin.customers.index', compact('customers'));
    }

    // Show the form for creating a new customer
    public function create()
    {
        return view('admin.customers.create');
    }

    // Store a newly created customer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
        $validated['role'] = 'customer';
        $validated['password'] = bcrypt($validated['password']);
        \App\Models\User::create($validated);
        return redirect()->route('admin.customers.index')->with('success', 'Customer added successfully');
    }

    // Show the form for editing the specified customer
    public function edit($id)
    {
        $customer = \App\Models\User::findOrFail($id);
        return view('admin.customers.edit', compact('customer'));
    }

    // Update the specified customer
    public function update(Request $request, $id)
    {
        $customer = \App\Models\User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'nullable|string',
            'address' => 'nullable|string',
        ]);
        $customer->update($validated);
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully');
    }

    // Remove the specified customer
    public function destroy($id)
    {
        $customer = \App\Models\User::findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully');
    }

    // Show rental history for a customer
    public function rentalHistory($id)
    {
        $customer = \App\Models\User::findOrFail($id);
        $rentals = $customer->rentals()->with('car')->get();
        return view('admin.customers.rental_history', compact('customer', 'rentals'));
    }
}
