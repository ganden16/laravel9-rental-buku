@extends('layouts.main')

@section('title','User')

@section('content')
<h1>Users List Active</h1>

<div class="mt-5 d-flex justify-content-end">
  <a href="/users/inactive" class="border border-2 btn btn-warning me-4 ">View Inactive User </a>
  <a href="/users/deleted" class="border border-2 btn btn-danger me-4 ">View Ban User</a>
</div>

<div class="mt-5">
  @if (session('status') == 'success')
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>

<div class="my-5">
  <table class="table table-striped ">
    <thead>
      <tr>
        <th>No.</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->username }}</td>
        @if ($item->phone)
        <td>{{ $item->phone }}</td>
        @else
        <td>
          <p class="text-warning"> Phone not found</p>
        </td>
        @endif
        <td>{{ $item->status}}</td>
        @if ($item->role_id == 1)
        <td>Admin</td>
        @else
        <td>User</td>
        @endif
        <td>
          <a href="/users/{{ $item->slug }}" class="btn btn-success">Detail</a>
          <form action="/users/{{ $item->slug }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" type="submit">Ban User</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection