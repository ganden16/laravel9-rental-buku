@extends('layouts.main')

@section('title','Add Categories')

@section('content')
<h1>Add New Category</h1>

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

  <form action="/categories" method="POST">
    @csrf
    <div class="">
      <label for="name" class="form-label">Name:</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
    </div>
    <div class="mt-5">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </form>
</div>
@endsection