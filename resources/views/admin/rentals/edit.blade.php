@extends('layouts.admin')

@section('content')
<h2>Edit Rental</h2>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.rentals.update', $rental->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="user_id" class="form-label">Customer</label>
        <select name="user_id" class="form-select">
            @foreach($users as $user)
                <option value="{{ $user->id }}" @if($rental->user_id == $user->id) selected @endif>{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="car_id" class="form-label">Car</label>
        <select name="car_id" class="form-select">
            @foreach($cars as $car)
                <option value="{{ $car->id }}" @if($rental->car_id == $car->id) selected @endif>{{ $car->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control" value="{{ $rental->start_date }}" required>
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">End Date</label>
        <input type="date" name="end_date" class="form-control" value="{{ $rental->end_date }}" required>
    </div>
    <div class="mb-3">
        <label for="total_cost" class="form-label">Total Cost</label>
        <input type="number" name="total_cost" class="form-control" value="{{ $rental->total_cost }}" required step="0.01">
    </div>
    <button type="submit" class="btn btn-primary">Update Rental</button>
            </form>
        </div>
    </div>
@endsection
