@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class="mb-4">Welcome to the MyCopo Admin Panel</h1>
        <div class="alert alert-info">
            Use the navigation bar to manage users, content, and all modules of your company website.
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Users</div>
            <div class="card-body">
                <h3 class="card-title">{{ $userCount }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Roles Breakdown</div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    @foreach($roleCounts as $role)
                        <li>{{ $role->name }}: {{ $role->users_count }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Recent Logins</div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    @foreach($recentLogins as $user)
                        <li>{{ $user->name }} ({{ $user->email }}) @if($user->last_login_at) - {{ $user->last_login_at->format('Y-m-d H:i') }} @endif</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
