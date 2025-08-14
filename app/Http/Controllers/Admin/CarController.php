<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Admin dashboard overview
    public function dashboard()
    {
        $totalCars = \App\Models\Car::count();
        $availableCars = \App\Models\Car::where('availability', true)->count();
        $totalRentals = \App\Models\Rental::count();
        $totalEarnings = \App\Models\Rental::sum('total_cost');
        return view('admin.dashboard', compact('totalCars', 'availableCars', 'totalRentals', 'totalEarnings'));
    }
    // Display a listing of cars
    public function index()
    {
        $cars = \App\Models\Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    // Show the form for creating a new car
    public function create()
    {
        return view('admin.cars.create');
    }

    // Store a newly created car
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        \App\Models\Car::create($validated);
        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully');
    }

    // Show the form for editing the specified car
    public function edit($id)
    {
        $car = \App\Models\Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    // Update the specified car
    public function update(Request $request, $id)
    {
        $car = \App\Models\Car::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'car_type' => 'required|string',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($validated);
        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully');
    }

    // Remove the specified car
    public function destroy($id)
    {
        $car = \App\Models\Car::findOrFail($id);
        $car->delete();
        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully');
    }
}
