@extends('layouts.frontend')

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($car->image)
            <img src="{{ asset('storage/' . $car->image) }}" class="img-fluid rounded mb-3" alt="{{ $car->name }}">
        @endif
    </div>
    <div class="col-md-6">
        <h2>{{ $car->name }}</h2>
        <p>Brand: {{ $car->brand }}</p>
        <p>Model: {{ $car->model }}</p>
        <p>Year: {{ $car->year }}</p>
        <p>Type: {{ $car->car_type }}</p>
        <p>Price: ${{ $car->daily_rent_price }}/day</p>
        <p>Status: {{ $car->availability ? 'Available' : 'Not Available' }}</p>
        @auth
            @if($car->availability)
                <form method="POST" action="{{ route('frontend.rentals.book', $car->id) }}">
                    @csrf
                    <div class="mb-2">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Book Now</button>
                </form>
            @else
                <div class="alert alert-warning">This car is not available for booking.</div>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login to Book</a>
        @endauth
    </div>
</div>
@endsection
