@extends('layouts.app')
@section('content')
<div class="container mt-4">
  <h3 class="fw-bold text-primary">Report Maintenance</h3>
  <form action="{{ route('user.maintenance.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label for="asset_id" class="form_label">Asset</label>
      <select name="asset_id" class="form-control" required>
        @foreach(\App\Models\Asset::all() as $asset)
          <option value="{{ $asset->id }}">{{ $asset->asset_name }} ({{ $asset->serial_number }})</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label>Description</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>
    <button class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
