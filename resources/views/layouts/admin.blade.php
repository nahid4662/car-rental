<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: #fff;
        }
        .sidebar a { color: #fff; text-decoration: none; display: block; padding: 10px 20px; }
        .sidebar a.active, .sidebar a:hover { background: #495057; }
        .admin-header { background: #212529; color: #fff; padding: 15px 30px; }
        .admin-footer { background: #212529; color: #fff; padding: 10px 30px; text-align: center; }
    </style>
</head>
<body>
    <div class="admin-header d-flex justify-content-between align-items-center">
        <h4>Car Rental Admin</h4>
        <form action="{{ route('admin.logout') }}" method="POST" class="mb-0">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 sidebar py-4">
                <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) active @endif">Dashboard</a>
                <a href="{{ route('admin.cars.index') }}" class="@if(request()->routeIs('admin.cars.*')) active @endif">Cars</a>
                <a href="{{ route('admin.rentals.index') }}" class="@if(request()->routeIs('admin.rentals.*')) active @endif">Rentals</a>
                <a href="{{ route('admin.customers.index') }}" class="@if(request()->routeIs('admin.customers.*')) active @endif">Customers</a>
            </nav>
            <main class="col-md-10 py-4">
                @yield('content')
            </main>
        </div>
    </div>
    <div class="admin-footer">
        &copy; {{ date('Y') }} Car Rental Admin Panel
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
