@extends('layouts.frontend')

@section('content')
<h2>My Bookings</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Car</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Total Cost</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($rentals as $rental)
            <tr>
                <td>{{ $rental->car->name ?? 'N/A' }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>${{ $rental->total_cost }}</td>
                <td>{{ $rental->start_date > date('Y-m-d') ? 'Upcoming' : 'Ongoing/Completed' }}</td>
                <td>
                    @if($rental->start_date > date('Y-m-d'))
                        <form method="POST" action="{{ route('frontend.rentals.cancel', $rental->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                        </form>
                    @else
                        <span class="text-muted">Cannot cancel</span>
                    @endif
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No bookings found.</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
