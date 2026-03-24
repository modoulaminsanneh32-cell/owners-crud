@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Cars</div>

                    <div class="card-body">
                        @if (Auth::user()->type=='admin')
                        <a href="{{ route('cars.create') }}" class="btn btn-success float-end">Add new Car</a>
                        @endif
                        <br><br>
                        <hr>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Reg Number</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Owner</th>
                                @if (Auth::user()->type=='admin')
                                <th>Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>{{ $car->reg_number }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->owner?->name }} {{ $car->owner?->surname }}</td>
                                    @if (Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('cars.delete', $car->id) }}" class="btn btn-danger">Delete</a>
                                    </td>
                                    @endif
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
