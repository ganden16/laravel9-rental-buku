@extends('layouts.main')

@section('title','Users')

@section('content')
<h1>User Details</h1>

<div class="mt-5 d-flex justify-content-end">
  <a href="/users" class="border border-2 btn btn-success me-4 ms-4 ">View Active User </a>
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

<div class="my-5 w-50">
  <div class="mb-3">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control readonly" readonly value="{{ $user->username }}">
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug:</label>
    <input type="text" class="form-control" readonly value="{{ $user->slug }}">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Phone:</label>
    <input type="text" class="form-control {{ $user->phone ?? 'text-warning' }}" readonly
      value="{{ $user->phone ?? 'Phone not found' }}">
  </div>
  <div class="mb-3">
    <label for="address" class="form-label">Address:</label>
    <textarea type="text" class="form-control" readonly>{{ $user->address }}</textarea>
  </div>
  <div class="mb-3">
    <label for="status" class="form-label">status:</label>
    <input type="text" class="form-control" readonly value="{{ $user->status }}">
  </div>
</div>

@if ($user->status !== 'active')
<form action="/users/allow/{{ $user->slug }}" method="post" class="d-inline">
  @method('patch')
  @csrf
  <button class="btn btn-warning" type="submit">Allow User</button>
</form>
@endif

<div class="my-5">
  <h1>User's Rent Log</h1>

  <x-rent-log-table :rentLogParams='$rent_logs'/>
</div>

@endsection