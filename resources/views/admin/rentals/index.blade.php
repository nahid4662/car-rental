@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Manage Rentals</h2>
    <a href="{{ route('admin.rentals.create') }}" class="btn btn-success">Add Rental</a>
</div>
<div class="row">
    @foreach($rentals as $rental)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Rental #{{ $rental->id }}</h5>
                    <p class="card-text">
                        <strong>Customer:</strong> {{ $rental->user->name ?? 'N/A' }}<br>
                        <strong>Car:</strong> {{ $rental->car->name ?? 'N/A' }}<br>
                        <strong>Start Date:</strong> {{ $rental->start_date }}<br>
                        <strong>End Date:</strong> {{ $rental->end_date }}<br>
                        <strong>Total Cost:</strong> ${{ $rental->total_cost }}
                    </p>
                    <a href="{{ route('admin.rentals.edit', $rental->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
