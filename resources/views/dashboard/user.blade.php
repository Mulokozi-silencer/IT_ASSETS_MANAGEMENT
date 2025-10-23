@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">My Dashboard</h2>

    <div class="row">
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

    <!-- My Assigned Assets Table -->
    <div class="card mt-4">
        <div class="card-header">My Assigned Assets</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Asset</th>
                        <th>Category</th>
                        <th>Assigned Date</th>
                        <th>Return Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($myAssignments as $assign)
                    <tr>
                        <td>{{ $assign->id }}</td>
                        <td>{{ $assign->asset->asset_name }}</td>
                        <td>{{ $assign->asset->category->name }}</td>
                        <td>{{ $assign->assigned_date }}</td>
                        <td>{{ $assign->return_date ?? '-' }}</td>
                        <td>{{ $assign->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('user.maintenance.create') }}" class="btn btn-primary">Report Maintenance</a>
    </div>
</div>
@endsection
