@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Car</div>
                    <div class="card-body">
                        <form action="{{ route('cars.update', $car->id) }}" method="post">
                            @csrf
                            @method('put') <div class="mb-3">
                                <label class="form-label">{{ __('cars.reg_number') }} :</label>
                                <input type="text" name="reg_number" class="form-control" value="{{ $car->reg_number }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('cars.owner') }}:</label>
                                <select name="owner_id" class="form-control">
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}" {{ $car->owner_id == $owner->id ? 'selected' : '' }}>
                                            {{ $owner->name }} {{ $owner->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="btn btn-success" type="submit">Update Car</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
