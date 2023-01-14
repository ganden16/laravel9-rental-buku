@extends('layouts.main')

@section('title','Add Books')


@section('content')
<h1>Add New Book</h1>

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

  @if (session('status') == 'success')
  <div class="alert alert-success" style="width: 500px">
    {{ session('message') }}
  </div>
  @endif

  <form action="/books" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-4">
      <label for="code" class="form-label">Code:</label>
      <input type="text" name="book_code" id="code" class="form-control" value="{{ old('book_code') }}"
        placeholder="Book code...">
    </div>
    <div class="mb-4">
      <label for="title" class="form-label">Title:</label>
      <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" placeholder="Title...">
    </div>
    <div class="mb-4">
      <label for="image" class="form-label">Image:</label>
      <input class="d-block form-control" type="file" name="image" id="image">
    </div>
    <div class="mb-4">
      <label for="categories" class="form-label">Categories:</label>
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