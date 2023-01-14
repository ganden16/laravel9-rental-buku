@extends('layouts.main')

@section('title','Edit Categories')

@section('content')
<h1>Edit Category</h1>

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

  <form action="/categories/{{ $category->slug }}" method="POST">
    @method('put')
    @csrf
    <div class="">
      <label for="name" class="form-label">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" placeholder="Category Name">
    </div>
    <div class="mt-5">
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>
@endsection