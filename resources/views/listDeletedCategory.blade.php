@extends('layouts.main')

@section('title','Deleted Category')

@section('content')
<h1>List Deleted Categories</h1>

<div class="mt-5 d-flex justify-content-end">
  <a href="/categories" class="btn btn-success ">View Categories</a>
</div>

<div class="mt-5">
  @if (session('status') == 'success')
  <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px">
    {{ session('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
</div>

<div class="mb-5">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Slug</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categories as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->slug }}</td>
        <td>
          <form action="/categories/restore/{{ $item->slug }}" method="POST" class="d-inline">
            @method('patch')
            @csrf
            <button type="submit" class="btn btn-warning">restore</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection