<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    // Display a listing of rentals
    public function index()
    {
        $rentals = \App\Models\Rental::with(['user', 'car'])->get();
        return view('admin.rentals.index', compact('rentals'));
    }

    // Show the form for creating a new rental
    public function create()
    {
        $users = \App\Models\User::all();
        $cars = \App\Models\Car::where('availability', true)->get();
        return view('admin.rentals.create', compact('users', 'cars'));
    }

    // Store a newly created rental
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric',
        ]);

        \App\Models\Rental::create($validated);
        return redirect()->route('admin.rentals.index')->with('success', 'Rental created successfully');
    }

    // Show the form for editing the specified rental
    public function edit($id)
    {
        $rental = \App\Models\Rental::findOrFail($id);
        $users = \App\Models\User::all();
        $cars = \App\Models\Car::all();
        return view('admin.rentals.edit', compact('rental', 'users', 'cars'));
    }

    // Update the specified rental
    public function update(Request $request, $id)
    {
        $rental = \App\Models\Rental::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'total_cost' => 'required|numeric',
        ]);
        $rental->update($validated);
        return redirect()->route('admin.rentals.index')->with('success', 'Rental updated successfully');
    }

    // Remove the specified rental
    public function destroy($id)
    {
        $rental = \App\Models\Rental::findOrFail($id);
        $rental->delete();
        return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully');
    }
}
