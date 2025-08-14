@extends('layouts.admin')

@section('content')
<h2>Manage Customers</h2>
<a href="{{ route('admin.customers.create') }}" class="btn btn-success mb-3">Add New Customer</a>
<div class="row">
    @foreach($customers as $customer)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $customer->name }}</h5>
                    <p class="card-text">
                        <strong>Email:</strong> {{ $customer->email }}<br>
                        <strong>Phone:</strong> {{ $customer->phone ?? '-' }}<br>
                        <strong>Address:</strong> {{ $customer->address ?? '-' }}
                    </p>
                    <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    <a href="{{ route('admin.customers.rentalHistory', $customer->id) }}" class="btn btn-info btn-sm">Rental History</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
