@extends('layouts.frontend')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4 text-center">
        <h1 class="display-4">Welcome to Car Rental Service</h1>
        <p class="lead">Find, book, and enjoy your ride with the best car rental deals in town!</p>
        <a href="{{ route('frontend.cars.index') }}" class="btn btn-lg btn-primary">Browse Cars</a>
    </div>
</div>
<div class="row mb-5">
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Wide Selection</h5>
                <p class="card-text">Choose from SUVs, Sedans, and more. All cars are well maintained and ready for your journey.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Easy Booking</h5>
                <p class="card-text">Book your car in just a few clicks. Flexible rental periods and instant confirmation.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">Customer Support</h5>
                <p class="card-text">Our support team is available 24/7 to help you with any queries or issues.</p>
            </div>
        </div>
    </div>
</div>
<h3 class="mb-4">Featured Cars</h3>
<div class="row">
    @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">Brand: {{ $car->brand }}<br>Type: {{ $car->car_type }}<br>Price: ${{ $car->daily_rent_price }}/day</p>
                    <a href="{{ route('frontend.cars.show', $car->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
