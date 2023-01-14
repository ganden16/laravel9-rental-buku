@extends('layouts.main')

@section('title','List Deleted Books')

@section('content')
<h1>List Deleted Books</h1>

<div class="mt-5 d-flex justify-content-end">
  <a href="/books" class="btn btn-success ">View Books</a>
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
        <th>Code</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Category</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($books as $item)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->book_code }}</td>
        <td>{{ $item->title }}</td>
        <td>{{ $item->slug }}</td>
        <td>
          @foreach ($item->categories as $category)
          <p class="badge text-bg-success">
            {{ $category->name }}
          </p>
          @endforeach
        </td>
        <td>{{ $item->status }}</td>
        <td>
          <form action="/books/restore/{{ $item->slug }}" method="POST" class="d-inline">
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