<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | IT Asset Tracker</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            width: 250px;
            background: #212529;
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #0d6efd;
            color: white;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column">
        <div class="p-3 text-center border-bottom">
            <h4 class="fw-bold text-white">IT Assets</h4>
        </div>
        <a href="#" class="active"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a href="#"><i class="bi bi-laptop me-2"></i>Assets</a>
        <a href="#"><i class="bi bi-people me-2"></i>Users</a>
        <a href="#"><i class="bi bi-bell me-2"></i>Notifications</a>
        <a href="#"><i class="bi bi-gear me-2"></i>Settings</a>
        <a href="#" class="mt-auto text-danger"><i class="bi bi-box-arrow-right me-2"></i>Logout</a>
    </div>

    {{-- Main Content --}}
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4 rounded">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h5 fw-bold">Dashboard Overview</span>
                <div class="d-flex align-items-center">
                    <span class="me-3 text-secondary">Hello, {{ Auth::user()->name ?? 'User' }}</span>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'User') }}" class="rounded-circle" width="40" height="40" alt="Avatar">
                </div>
            </div>
        </nav>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-3">
                    <h6 class="text-muted">Total Assets</h6>
                    <h3 class="fw-bold text-primary">{{ $totalAssets ?? 0 }}</h3>
                    <p class="small text-muted">Tracked across departments</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h6 class="text-muted">Assigned Users</h6>
                    <h3 class="fw-bold text-success">{{ $assignedUsers ?? 0 }}</h3>
                    <p class="small text-muted">Users with allocated assets</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3">
                    <h6 class="text-muted">Pending Maintenance</h6>
                    <h3 class="fw-bold text-warning">{{ $pendingMaintenance ?? 0 }}</h3>
                    <p class="small text-muted">Assets due for servicing</p>
                </div>
            </div>
        </div>

        <div class="mt-5 card p-4">
            <h5 class="fw-bold mb-3">Recent Asset Activities</h5>
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Asset Name</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities ?? [] as $activity)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $activity->asset_name }}</td>
                            <td>{{ $activity->category }}</td>
                            <td><span class="badge bg-{{ $activity->status == 'Active' ? 'success' : 'secondary' }}">{{ $activity->status }}</span></td>
                            <td>{{ $activity->assigned_to ?? 'Unassigned' }}</td>
                            <td>{{ $activity->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No recent activities</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>
