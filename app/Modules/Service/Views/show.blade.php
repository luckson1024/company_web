@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <div class="card shadow-sm rounded-lg" style="background: #F8F9FA; border-radius: 12px;">
        <div class="card-body">
            <h1 class="mb-4" style="font-family: 'Inter', 'Manrope', sans-serif; color: #0A192F;">{{ $service->name }}</h1>
            <p style="font-family: 'Inter', 'Figtree', sans-serif; color: #4A5568;">{{ $service->description }}</p>
            <p class="fw-bold" style="color: #3B82F6;">Price: ${{ number_format($service->price, 2) }}</p>
            <span class="badge {{ $service->active ? 'bg-success' : 'bg-secondary' }}" style="border-radius: 8px;">{{ $service->active ? 'Active' : 'Inactive' }}</span>
            <div class="mt-4">
                <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-outline-primary" style="border-color: #3B82F6; color: #3B82F6; border-radius: 8px;">Edit</a>
                <a href="{{ route('admin.services.index') }}" class="btn btn-light" style="border-radius: 8px;">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
