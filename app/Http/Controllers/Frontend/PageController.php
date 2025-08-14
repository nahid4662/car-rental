<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    // Home page
    public function home()
    {
        $cars = \App\Models\Car::where('availability', true)->take(6)->get();
        return view('frontend.home', compact('cars'));
    }

    // About page
    public function about()
    {
        return view('frontend.about');
    }

    // Rentals page
    public function rentals()
    {
        $rentals = \App\Models\Rental::with(['car', 'user'])->get();
        return view('frontend.rentals', compact('rentals'));
    }

    // Contact page
    public function contact()
    {
        return view('frontend.contact');
    }
}
