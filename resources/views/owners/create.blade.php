@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Add New Owner</div>
                    <div class="card-body">
                        <form action="{{ route('owners.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Surname</label>
                                <input type="text" name="surname" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Save Owner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
