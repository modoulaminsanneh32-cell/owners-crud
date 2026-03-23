@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add New Car</div>

                    <div class="card-body">
                        <form action="{{ route('cars.store') }}" method="POST">
                            @csrf <div class="mb-3">
                                <label class="form-label">Registration Number</label>
                                <input type="text" name="reg_number" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" name="brand" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Model</label>
                                <input type="text" name="model" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Owner</label>
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
