<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    // Book a car
    public function book(Request $request, $carId)
    {
        $car = \App\Models\Car::findOrFail($carId);
    $user = Auth::user();
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Check car availability for the selected period
        $overlap = \App\Models\Rental::where('car_id', $carId)
            ->where(function($q) use ($validated) {
                $q->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                  ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']]);
            })->exists();
        if ($overlap) {
            return back()->with('error', 'Car is not available for the selected dates.');
        }

        $days = (strtotime($validated['end_date']) - strtotime($validated['start_date'])) / 86400 + 1;
        $total_cost = $days * $car->daily_rent_price;

        $rental = \App\Models\Rental::create([
            'user_id' => $user->id,
            'car_id' => $carId,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'total_cost' => $total_cost,
        ]);

        // Send email to customer
        Mail::to($user->email)->send(new \App\Mail\RentalCreated($rental));

        // Send email to admin (first admin user)
        $admin = \App\Models\User::where('role', 'admin')->first();
        if ($admin) {
            Mail::to($admin->email)->send(new \App\Mail\RentalCreated($rental));
        }

        return redirect()->route('frontend.rentals.myBookings')->with('success', 'Car booked successfully!');
    }

    // View user's bookings
    public function myBookings()
    {
    $user = Auth::user();
        $rentals = $user->rentals()->with('car')->get();
        return view('frontend.rentals.my_bookings', compact('rentals'));
    }

    // Cancel a booking
    public function cancel($rentalId)
    {
        $rental = \App\Models\Rental::findOrFail($rentalId);
        if ($rental->start_date > date('Y-m-d')) {
            $rental->delete();
            return back()->with('success', 'Booking canceled successfully.');
        }
        return back()->with('error', 'Cannot cancel a booking that has already started.');
    }
}
