@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<h1>Rent Log List</h1>

<div class="mt-5">
  <x-rent-log-table :rentLogParams='$rent_logs'/>
</div>

@endsection