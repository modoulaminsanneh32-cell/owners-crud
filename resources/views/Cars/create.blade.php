@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>
                                {{  $error }}
                            </div>
                        @endforeach
                    </div>

                @endif
                <div class="card">
                    <div class="card-header">{{ __('cars.car') }}</div>

                    <div class="card-body">
                        <form action="{{ route('cars.store') }}" method="POST">
                            @csrf <div class="mb-3">
                                <label class="form-label">{{ __('cars.reg_number') }}</label>
                                <input class="form-control @error('reg_number') is-invalid @enderror" type="text" name="reg_number" value="{{ old('reg_number') }}" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('cars.brand') }}</label>
                                <input class="form-control @error('brand') is-invalid @enderror" type="text" name="brand" value="{{ old('brand') }}" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('cars.model') }}</label>
                                <input class="form-control @error('model') is-invalid @enderror" type="text" name="model" value="{{ old('model') }}" >
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('cars.owner') }}</label>
                                <select name="owner_id" class="form-control" required>
                                    <option value="">-- Select Owner --</option>
                                    @foreach($owners as $owner)
                                        <option value="{{ $owner->id }}">
                                            {{ $owner->name }} {{ $owner->surname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success">Save Car</button>
                                <a href="{{ route('cars.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
