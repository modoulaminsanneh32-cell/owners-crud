@extends('layouts.app')

@section('content')
<div class="container">
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($owners as $owner)
    <tr>
      <th scope="row">{{$owner->id}}</th>
      <td>{{$owner->name}}</td>
      <td>{{$owner->surname}}</td>
      <td>
        <form action="/owners/{{$owner->id}}" method="POST">
          @csrf  
          @method('DELETE')         
          <a href="/owners/{{$owner->id}}" class="btn btn-success">View</a>
          <a href="/owners/{{$owner->id}}/edit" class="btn btn-secondary">Edit</a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
      
    </tr>
    @endforeach
</tbody>
</table>
</div>
@endsection