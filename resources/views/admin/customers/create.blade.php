@extends('layouts.admin')

@section('content')
<h2>Add New Customer</h2>
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.customers.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" name="address" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Add Customer</button>
            </form>
        </div>
    </div>
@endsection
