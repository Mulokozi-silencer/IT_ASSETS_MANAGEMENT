@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row">
        <!-- Total Assets -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Assets</h5>
                    <p class="card-text fs-3">{{ $totalAssets }}</p>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text fs-3">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>

        <!-- Pending Maintenance -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Pending Maintenance</h5>
                    <p class="card-text fs-3">{{ $pendingMaintenance }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Assignments Table -->
    <div class="card mt-4">
        <div class="card-header">Recent Assignments</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asset</th>
                        <th>User</th>
                        <th>Assigned Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentAssignments as $assign)
                    <tr>
                        <td>{{ $assign->id }}</td>
                        <td>{{ $assign->asset->asset_name }}</td>
                        <td>{{ $assign->user->name }}</td>
                        <td>{{ $assign->assigned_date }}</td>
                        <td>{{ $assign->return_date ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
