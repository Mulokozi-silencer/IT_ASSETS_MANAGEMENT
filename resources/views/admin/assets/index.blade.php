@extends('layouts.app')
@section('content')
<div class="container">
  <h3>All Assets</h3>
  <a href="{{ route('admin.assets.create') }}" class="btn btn-primary mb-3">Add Asset</a>
  <table class="table table-striped">
    <thead><tr><th>#</th><th>Name</th><th>Serial</th><th>Category</th><th>Status</th><th>Actions</th></tr></thead>
    <tbody>
      @foreach($assets as $asset)
      <tr>
        <td>{{ $asset->id }}</td>
        <td>{{ $asset->asset_name }}</td>
        <td>{{ $asset->serial_number }}</td>
        <td>{{ $asset->category->name }}</td>
        <td>{{ $asset->status }}</td>
        <td>
          <a href="{{ route('admin.assets.edit',$asset) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
          <form action="{{ route('admin.assets.destroy',$asset) }}" method="POST" class="d-inline">
            @method('DELETE') @csrf
            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{ $assets->links() }}
</div>
@endsection
