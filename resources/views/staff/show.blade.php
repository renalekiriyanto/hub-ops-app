@extends('layouts.main')
@section('title', 'Detail Data Staff')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Detail Staff: {{ $staff->name }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID Staff</th>
                                <td>{{ $staff->id_staff }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $staff->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $staff->phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Vehicle Type</th>
                                <td>{{ $staff->vehicle_type }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ $staff->title }}</td>
                            </tr>
                            <tr>
                                <th>Contract Type</th>
                                <td>{{ $staff->contract_type }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $staff->status }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('staff.index') }}" class="btn btn-secondary">Back to List</a>
                        <a href="{{ route('staff.edit', $staff->id_staff) }}" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
