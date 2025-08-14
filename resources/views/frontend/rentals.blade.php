@extends('layouts.frontend')

@section('content')
<h2>All Rentals</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Customer</th>
            <th>Car</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Cost</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rentals as $rental)
            <tr>
                <td>{{ $rental->user->name ?? 'N/A' }}</td>
                <td>{{ $rental->car->name ?? 'N/A' }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>${{ $rental->total_cost }}</td>
            </tr>
        @empty
            <tr><td colspan="5">No rentals found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
