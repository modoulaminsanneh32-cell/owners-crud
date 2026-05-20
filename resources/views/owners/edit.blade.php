@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card col-6 offset-3">
  <h5 class="card-header">Edit Owner</h5>
  <div class="card-body">
    @include('messages')
    <form action="/owners/{{$owner->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">{{ __('owners.name') }}</label>
            <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror" value="{{ $owner->name }}">
            @error('name')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
           </div>

   <div class="mb-3">class
            <label class="form-label">{{ __('owners.surname') }}</label>
            <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ $owner->surname }}">
            @error('name')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-success">Submit</button>

  </div>
    </form>
  </div>
</div>
</div>
@endsection
