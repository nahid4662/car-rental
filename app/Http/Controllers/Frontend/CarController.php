<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    // Display available cars with filters
    public function index(Request $request)
    {
        $query = \App\Models\Car::query()->where('availability', true);
        if ($request->filled('car_type')) {
            $query->where('car_type', $request->car_type);
        }
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }
        if ($request->filled('min_price')) {
            $query->where('daily_rent_price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('daily_rent_price', '<=', $request->max_price);
        }
        $cars = $query->get();
        return view('frontend.cars.index', compact('cars'));
    }

    // Show car details
    public function show($id)
    {
        $car = \App\Models\Car::findOrFail($id);
        return view('frontend.cars.show', compact('car'));
    }
}
