<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .frontend-header { background: #007bff; color: #fff; padding: 15px 30px; }
        .frontend-footer { background: #343a40; color: #fff; padding: 10px 30px; text-align: center; }
    </style>
</head>
<body>
    <div class="frontend-header d-flex justify-content-between align-items-center">
        <h4>Car Rental Service</h4>
        <nav>
            <a href="{{ route('frontend.home') }}" class="btn btn-link text-white">Home</a>
            <a href="{{ route('frontend.about') }}" class="btn btn-link text-white">About</a>
            <a href="{{ route('frontend.cars.index') }}" class="btn btn-link text-white">Browse Cars</a>
            <a href="{{ route('frontend.rentals') }}" class="btn btn-link text-white">Rentals</a>
            <a href="{{ route('frontend.contact') }}" class="btn btn-link text-white">Contact</a>
            @auth
                <a href="{{ route('frontend.rentals.myBookings') }}" class="btn btn-link text-white">My Bookings</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-link text-white">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-link text-white">Login</a>
                <a href="{{ route('register') }}" class="btn btn-link text-white">Sign Up</a>
            @endauth
        </nav>
    </div>
    <div class="container py-4">
        @yield('content')
    </div>
    <div class="frontend-footer mt-4">
        &copy; {{ date('Y') }} Car Rental Service. All rights reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
