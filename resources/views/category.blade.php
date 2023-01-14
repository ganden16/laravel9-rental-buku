@extends('layouts.main')

@section('title','Categories')

@section('content')
<h1>Category List</h1>

<div class="mt-5 d-flex justify-content-end">
  <a href="/categories/deleted" class="btn btn-light me-4 border border-2 ">View Deleted Data</a>
  <a href="/categories/add" class="btn btn-success ">Add Data</a>
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
          <a class="text-decoration-none btn btn-warning" href="/categories/edit/{{ $item->slug }}">edit</a>
          <form action="/categories/{{ $item->slug }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button onclick="confirm()" type="submit" class="btn btn-danger">delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>
  function confirm(){
    Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
    }
  })
  }
</script>
@endsection