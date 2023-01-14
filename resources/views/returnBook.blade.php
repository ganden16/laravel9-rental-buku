@extends('layouts.main')

@section('title','Return Books')

@section('content')

@extends('layouts.main')

@section('title','Book Rent')

@section('content')
<div class="col-12 col-md-6 offset-md-2 col-lg-6 offset-md-3">
  <h1 class="mb-5">Book Return Form</h1>
  @if ($errors->any())
  <div class="alert alert-danger" style="width: 500px">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="my-5">
    @if(session('status') == 'true')
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 500px">
      {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @elseif(session('status') == 'false')
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 500px">
      {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  </div>

  <form action="/rents/return" method="POST">
    @csrf
    <div class="mb-3">
      <label for="user" class="form-label">User</label>
      <select name="user_id" id="user" class="form-select select-multiple">
        <option value="">Select User</option>
        @foreach ($users as $item)
        <option value="{{ $item->id }}">{{ $item->username }}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3">
      <label for="book" class="form-label">Book</label>
      <select name="book_id" id="book" class="form-control select-multiple">
        <option value="">Select Book</option>
        @foreach ($books as $item)
        <option value="{{ $item->id }}">{{ $item->title }} -------------- {{ $item->book_code }}</option>
        @endforeach
      </select>
    </div>
    <div class="">
      <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </form>
</div>
@endsection

@endsection