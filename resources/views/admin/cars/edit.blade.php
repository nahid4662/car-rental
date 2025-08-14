@extends('layouts.admin')

@section('content')
<h2>Edit Car</h2>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.cars.update', $car->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Car Name</label>
        <input type="text" name="name" class="form-control" value="{{ $car->name }}" required>
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required>
    </div>
    <div class="mb-3">
        <label for="model" class="form-label">Model</label>
        <input type="text" name="model" class="form-control" value="{{ $car->model }}" required>
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" name="year" class="form-control" value="{{ $car->year }}" required>
    </div>
    <div class="mb-3">
        <label for="car_type" class="form-label">Car Type</label>
        <input type="text" name="car_type" class="form-control" value="{{ $car->car_type }}" required>
    </div>
    <div class="mb-3">
        <label for="daily_rent_price" class="form-label">Daily Rent Price</label>
        <input type="number" name="daily_rent_price" class="form-control" value="{{ $car->daily_rent_price }}" required step="0.01">
    </div>
    <div class="mb-3">
        <label for="availability" class="form-label">Availability</label>
        <select name="availability" class="form-select">
            <option value="1" @if($car->availability) selected @endif>Available</option>
            <option value="0" @if(!$car->availability) selected @endif>Not Available</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Car Image</label>
        <input type="file" name="image" class="form-control">
        @if($car->image)
            <img src="{{ asset('storage/' . $car->image) }}" width="100" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update Car</button>
            </form>
        </div>
    </div>
@endsection
