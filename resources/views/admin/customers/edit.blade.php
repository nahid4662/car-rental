@extends('layouts.admin')

@section('content')
<h2>Edit Customer</h2>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.customers.update', $customer->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control" value="{{ $customer->address }}">
    </div>
    <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>
        </div>
    </div>
@endsection
