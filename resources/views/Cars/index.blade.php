@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cars</div>

                    <div class="card-body">
                        <a href="{{ route('cars.create') }}" class="btn btn-success float-end">Add new Car</a>
                        <br><br>
                        <hr>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Reg Number</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Owner</th> <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->reg_number }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>

                                    <td>
                                        {{ $car->owner?->name }} {{ $car->owner?->surname }}
                                    </td>

                                    <td>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-info">Edit</a>

                                        <a href="{{ route('cars.delete', $car->id) }}" class="btn btn-danger">Delete</a>
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
