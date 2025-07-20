@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <h1 class="mb-4" style="font-family: 'Inter', 'Manrope', sans-serif; color: #0A192F;">Services</h1>
    <div class="card shadow-sm rounded-lg mb-4" style="background: #F8F9FA; border-radius: 12px;">
        <div class="card-body">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary" style="background: #2DD4BF; border: none; border-radius: 8px; transition: box-shadow 0.2s;">Add Service</a>
        </div>
    </div>
    <div class="row">
        <!-- Example service list, replace with dynamic data -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm rounded-lg" style="border-radius: 12px;">
                <div class="card-body">
                    <h5 class="card-title" style="font-family: 'Inter', 'Manrope', sans-serif; color: #2D3748;">Service Name</h5>
                    <p class="card-text" style="font-family: 'Inter', 'Figtree', sans-serif; color: #4A5568;">Service description goes here.</p>
                    <a href="#" class="btn btn-outline-primary" style="border-color: #3B82F6; color: #3B82F6; border-radius: 8px;">View</a>
                </div>
            </div>
        </div>
        <!-- ...repeat for each service... -->
    </div>
</div>
@endsection
