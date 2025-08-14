@extends('layouts.admin')

@section('content')
<h2>Add New Rental</h2>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.rentals.store') }}">
    @csrf
    <div class="mb-3">
        <label for="user_id" class="form-label">Customer</label>
        <select name="user_id" class="form-select" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="car_id" class="form-label">Car</label>
        <select name="car_id" class="form-select" required>
            @foreach($cars as $car)
                <option value="{{ $car->id }}">{{ $car->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" name="end_date" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="total_cost" class="form-label">Total Cost</label>
        <input type="number" name="total_cost" class="form-control" required step="0.01">
    </div>
    <button type="submit" class="btn btn-success">Add Rental</button>
            </form>
        </div>
    </div>
@endsection
