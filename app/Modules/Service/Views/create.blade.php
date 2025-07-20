@extends('layouts.admin')
@section('content')
<div class="container py-4">
    <h1 class="mb-4" style="font-family: 'Inter', 'Manrope', sans-serif; color: #0A192F;">Create Service</h1>
    <div class="card shadow-sm rounded-lg" style="background: #F8F9FA; border-radius: 12px;">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #2D3748;">Name</label>
                    <input type="text" class="form-control" id="name" name="name" style="border-radius: 8px; border: 1px solid #E2E8F0;" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label" style="color: #2D3748;">Description</label>
                    <textarea class="form-control" id="description" name="description" style="border-radius: 8px; border: 1px solid #E2E8F0;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label" style="color: #2D3748;">Price</label>
                    <input type="number" class="form-control" id="price" name="price" style="border-radius: 8px; border: 1px solid #E2E8F0;" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="active" name="active">
                    <label class="form-check-label" for="active" style="color: #2D3748;">Active</label>
                </div>
                <button type="submit" class="btn btn-primary" style="background: #2DD4BF; border: none; border-radius: 8px; transition: box-shadow 0.2s;">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
