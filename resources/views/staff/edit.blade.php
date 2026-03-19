@extends('layouts.main')
@section('title', 'Edit Data Staff')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Edit Staff: {{ $staff->name }}</h3>
                    </div>
                    <!-- form start -->
                    <form action="{{ route('staff.update', $staff->id_staff) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>ID Staff</label>
                                <input type="text" class="form-control" name="id_staff" value="{{ old('id_staff', $staff->id_staff) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $staff->name) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number', $staff->phone_number) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Vehicle Type</label>
                                <input type="text" class="form-control" name="vehicle_type" value="{{ old('vehicle_type', $staff->vehicle_type) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title', $staff->title) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Contract Type</label>
                                <input type="text" class="form-control" name="contract_type" value="{{ old('contract_type', $staff->contract_type) }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <input type="text" class="form-control" name="status" value="{{ old('status', $staff->status) }}" required>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
