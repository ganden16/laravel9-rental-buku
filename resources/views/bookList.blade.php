@extends('layouts.main')

@section('title','Book-List')

@section('content')
<form action="">
  <div class="row">
    <div class="col-12 col-sm-6">
      <select name="category" class="form-select" id="category">
        <option value="">Select Category</option>
        @foreach ($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>

        @endforeach
      </select>
    </div>
    <div class="col-12 col-sm-6">
      <div class="mb-3 input-group">
        <input type="text" name="search" class="form-control" placeholder="Search...">
        <button type="submit" class="btn btn-success">Search</button>
      </div>
    </div>
  </div>
</form>
<div class="my-5" style="">
  <div class="row">
    @foreach ($books as $item)
    <div class="mb-3 col-lg-3 col-md-4 col-sm-6">
      <div class="card h-100">
        @if ($item->cover)
        <img src="{{ asset('storage/cover/'.$item->cover) }}" class="card-img-top" draggable="false">
        @else
        <img src="https://source.unsplash.com/500x500?cover" class="card-img-top">
        @endif
        <div class="card-body">
          <h5 class="card-title d-inline">{{ $item->book_code }}</h5>
          <p class="card-text {{ $item->status == 'in stock' ? 'badge text-bg-success' : 'badge text-bg-danger' }}">
            {{ $item->status }}</p>
          <p class="card-text ">{{ $item->title }}</p>
          @foreach ($item->categories as $category)

          <a class="card-text text-success text-decoration-none">{{ $category->name }}</a>
          @endforeach
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection