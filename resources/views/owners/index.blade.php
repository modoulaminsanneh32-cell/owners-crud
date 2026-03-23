@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Owners</div>
                    <div class="card-body">
                        <a href="{{ route('owners.create') }}" class="btn btn-success float-end">Add new Owner</a>
                        <br><br>
                        <hr>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Cars</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($owners as $owner)
                                <tr>
                                    <td>{{ $owner->name }}</td>
                                    <td>{{ $owner->surname }}</td>
                                    <td>
                                        @foreach($owner->cars as $car)
                                            <div class="small">• {{ $car->brand }} {{ $car->model }}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('owners.delete', $owner->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
