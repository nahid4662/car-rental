@extends('layouts.frontend')

@section('content')
<h2>Browse Cars</h2>
<form method="GET" class="row g-3 mb-4">
    <div class="col-md-3">
        <input type="text" name="brand" class="form-control" placeholder="Brand" value="{{ request('brand') }}">
    </div>
    <div class="col-md-3">
        <input type="text" name="car_type" class="form-control" placeholder="Type (SUV, Sedan, etc.)" value="{{ request('car_type') }}">
    </div>
    <div class="col-md-2">
        <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ request('min_price') }}">
    </div>
    <div class="col-md-2">
        <input type="number" name="max_price" class="form-control" placeholder="Max Price" value="{{ request('max_price') }}">
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Filter</button>
    </div>
</form>
<div class="row">
    @forelse($cars as $car)
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
    @empty
        <div class="col-12"><p>No cars found.</p></div>
    @endforelse
</div>
@endsection
