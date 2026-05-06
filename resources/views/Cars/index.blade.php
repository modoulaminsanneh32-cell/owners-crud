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
                                <th></th>
                                <th>{{ __('Reg number') }}</th>
                                <th>{{ __('cars.Brand') }}</th>
                                <th>{{ __('cars.Model') }}</th>
                                <th>{{ __('cars.Owner') }}</th>
                                @if (Auth::user()->type=='admin')
                                <th style style="width: 150px";>{{__('cars.actions') }}</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cars as $car)
                                <tr>
                                    <td>
                                        @if ($car->photo!=null)
                                            <img src="/storage/{{ $car->photo }}" alt="" style="width:200px;">
                                        @endif
                                    </td>
                                    <td>{{ $car->reg_number }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->owner?->name }} {{ $car->owner?->surname }}</td>
                                    @if (Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-info">Edit</a>
                                        <form action="{{ route('cars.delete', $car->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
