@extends('layouts.main')

@section('title','Books List')

@section('content')

<style>
  .badge:hover{
    transform: scale(1.2);
    cursor: pointer;
    margin: 0px 5px;
  }
</style>

<h1>Book List</h1>

<div class="mt-5 d-flex justify-content-end">
  <a href="/books/deleted" class="border border-2 btn btn-light me-4 ">View Deleted Book</a>
  <a href="/books/add" class="btn btn-success ">Add Book</a>
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
          <a class="text-decoration-none btn btn-warning" href="/books/edit/{{ $item->slug }}">edit</a>
          <form action="/books/{{ $item->slug }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection