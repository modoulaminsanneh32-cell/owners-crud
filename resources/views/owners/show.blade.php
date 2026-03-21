@extends('layouts.app')

@section('content')
<div class="container">
<div class="card col-6 offset-3">
  <h5 class="card-header">{{$owner->name}}</h5>
  <div class="card-body">
    <h5 class="card-title">{{$owner->surname}}</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
  </div>
</div>
@endsection