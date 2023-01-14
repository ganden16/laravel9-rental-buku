@extends('layouts.main')

@section('title','Profile')

@section('content')
<div class="my-5">
  <h1>Your Rent Log</h1>
  
  <x-rent-log-table :rentLogParams='$rent_logs' />
</div>
@endsection