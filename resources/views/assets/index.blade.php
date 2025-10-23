@extends('layouts.app')
@section('content')
<div class="container">
  <h3>My Assigned Assets</h3>
  <table class="table">
    <thead><tr><th>#</th><th>Asset</th><th>Serial</th><th>Assigned Date</th><th>Return Date</th></tr></thead>
    <tbody>
      @foreach(auth()->user()->assignments as $assign)
      <tr>
        <td>{{ $assign->id }}</td>
        <td>{{ $assign->asset->asset_name }}</td>
        <td>{{ $assign->asset->serial_number }}</td>
        <td>{{ $assign->assigned_date }}</td>
        <td>{{ $assign->return_date ?? '-' }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
