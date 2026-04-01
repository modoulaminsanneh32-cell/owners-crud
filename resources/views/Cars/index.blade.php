@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Cars.cars') }}</div>

                    <div class="card-body">
                        @if (Auth::user()->type=='admin')
                        <a href="{{ route('cars.create') }}" class="btn btn-success float-end">{{ __('cars.add_new') }}</a>
                        @endif
                        <br><br>
                        <hr>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('Reg number') }}</th>
                                <th>{{ __('cars.Brand') }}</th>
                                <th>{{ __('cars.Model') }}</th>
                                <th>{{ __('Owner') }}</th>
                                @if (Auth::user()->type=='admin')
                                <th>{{ __('cars.actions') }}</th>
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
