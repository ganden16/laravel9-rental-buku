@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<h1>Welcome, {{ auth()->user()->username }}</h1>

<div class="my-5 row">
  <div class="col-lg-4 ">
    <div class="card-data book">
      <div class="row">
        <div class="col-6"><i class="bi bi-book-half"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
          <div class="card-desc">Books</div>
          <div class="card-count">{{ $bookCount }}</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 ">
    <div class="card-data category">
      <div class="row">
        <div class="col-6"><i class="bi bi-list-task"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
          <div class="card-desc">Categories</div>
          <div class="card-count">{{ $categoryCount }}</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-4 ">
    <div class="card-data user">
      <div class="row">
        <div class="col-6"><i class="bi bi-people"></i></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-end">
          <div class="card-desc">Users</div>
          <div class="card-count">{{ $userCount }}</div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="">
  <h2>#Rent Log</h2>
  <table class="table table-success table-striped">
    <thead>
      <tr>
        <th>No.</th>
        <th>User</th>
        <th>Book Title</th>
        <th>Rent Date</th>
        <th>Return Date</th>
        <th>Actual Return Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td >No data</td>
      </tr>
    </tbody>
  </table>
</div>

@endsection