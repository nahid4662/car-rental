<h2>Car Rental Confirmation</h2>
<p>Dear {{ $rental->user->name }},</p>
<p>Your booking for <strong>{{ $rental->car->name }}</strong> ({{ $rental->car->brand }}) from {{ $rental->start_date }} to {{ $rental->end_date }} has been confirmed.</p>
<p>Total Cost: ${{ $rental->total_cost }}</p>
<p>Thank you for choosing our service!</p>
