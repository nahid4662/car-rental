@extends('layouts.admin')

@section('content')
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Cars</h5>
                <p class="card-text display-6">{{ $totalCars }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Available Cars</h5>
                <p class="card-text display-6">{{ $availableCars }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Rentals</h5>
                <p class="card-text display-6">{{ $totalRentals }}</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-info mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Earnings</h5>
                <p class="card-text display-6">${{ $totalEarnings }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
