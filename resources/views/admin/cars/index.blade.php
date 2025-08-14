@extends('layouts.admin')

@section('content')
<h2>Manage Cars</h2>
<a href="{{ route('admin.cars.create') }}" class="btn btn-success mb-3">Add New Car</a>
<div class="row">
    @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($car->image)
                    <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">
                        <strong>Brand:</strong> {{ $car->brand }}<br>
                        <strong>Model:</strong> {{ $car->model }}<br>
                        <strong>Year:</strong> {{ $car->year }}<br>
                        <strong>Type:</strong> {{ $car->car_type }}<br>
                        <strong>Price:</strong> ${{ $car->daily_rent_price }}<br>
                        <strong>Available:</strong> {{ $car->availability ? 'Yes' : 'No' }}
                    </p>
                    <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST" style="display:inline-block;">
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
