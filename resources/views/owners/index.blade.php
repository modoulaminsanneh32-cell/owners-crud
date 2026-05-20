@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('owners.owners') }}</div>
                    <div class="card-body">
                        @if (Auth::user()->type=='admin')
                        <a href="{{ route('owners.create') }}" class="btn btn-success float-end">{{ __('owners.add_new') }}</a>
                        @endif
                        <br><br>
                        <hr>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>{{ __('owners.name') }}</th>
                                <th>{{ __('owners.surname') }}</th>
                                <th>{{ __('owners.cars') }}</th>
                                @if (Auth::user()->type=='admin')
                                <th>{{ __('owners.actions') }}</th>
                                @endif
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
                                    @if (Auth::user()->type=='admin')
                                    <td>
                                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-info">Edit</a>
                                        @can("deleteOwner", $owner)
                                        <form action="{{ route('owners.delete', $owner->id) }}" method="POST" style="display:inline;">
                                        @endcan
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
