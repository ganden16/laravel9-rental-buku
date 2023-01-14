@extends('layouts.main')

@section('title','Edit Book')

@section('content')

<style>
  .badge:hover {
    cursor: pointer;
    transform: scale(1.1);
    margin: 0px 4px;
  }
</style>

<h1>Edit Book</h1>

<div class="mt-5 w-50">

  @if ($errors->any())
  <div class="alert alert-danger" style="width: 500px">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="/books/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-4">
      <label for="code" class="form-label">Code:</label>
      <input type="text" name="book_code" id="code" class="form-control" value="{{ $book->book_code }}"
        placeholder="Book code...">
    </div>
    <div class="mb-4">
      <label for="title" class="form-label">Title:</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" placeholder="Title...">
    </div>
    <div class="mb-4">
      <label for="image" class="form-label d-block">Image:</label>
      @if ($book->cover)
      <img src="{{ asset('storage/cover/'. $book->cover) }}" class="img-fluid" style="height: 200px">
      @else
      <p class="text-info">image not found</p>
      @endif
      <p class="">{{ $book->cover }}</p>
      <input class="d-block form-control" type="file" name="image" id="image">
    </div>
    <div class="mb-4">
      <label for="categories" class="form-label">Categories:</label>
      @foreach ($book->categories as $category)
      <p class="badge text-bg-info">{{ $category->name }}</p>
      @endforeach
      <select name="categories[]" id="categories" class="form-select select-multiple" multiple>
        @foreach ($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
      </select>
    </div>
    <div class="mt-5">
      <button type="submit" class="btn btn-success">Confirm</button>
    </div>
  </form>
</div>
@endsection