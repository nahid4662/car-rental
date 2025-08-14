@extends('layouts.admin')

@section('content')
<h2>{{ $customer->name }}'s Rental History</h2>
<div class="row">
    @foreach($rentals as $rental)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $rental->car->name ?? 'N/A' }}</h5>
                    <p class="card-text">
                        <strong>Start Date:</strong> {{ $rental->start_date }}<br>
                        <strong>End Date:</strong> {{ $rental->end_date }}<br>
                        <strong>Total Cost:</strong> ${{ $rental->total_cost }}
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
