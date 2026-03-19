@extends('layouts.main')
@section('title', 'List Data Staff')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">

                            {{-- LEFT: Search --}}
                            <form method="GET" action="{{ route('staff.index') }}" class="d-flex" style="gap:10px;">
                                <input type="text" name="search" class="form-control" placeholder="Search name..." value="{{ request('search') }}">
                                <select name="vehicle_type" class="form-select">
                                    <option value="">All Vehicle Types</option>
                                    <option value="2WH" {{ request('vehicle_type') == '2WH' ? 'selected' : '' }}>2WH</option>
                                    <option value="4WH" {{ request('vehicle_type') == '4WH' ? 'selected' : '' }}>4WH</option>
                                </select>
                                <select name="title" class="form-select">
                                    <option value="">All Titles</option>
                                    <option value="RIDER" {{ request('title') == 'RIDER' ? 'selected' : '' }}>RIDER</option>
                                    <option value="DRIVER" {{ request('title') == 'DRIVER' ? 'selected' : '' }}>DRIVER</option>
                                </select>
                                <button class="btn btn-primary" type="submit">
                                    Search
                                </button>
                                <a href="{{ route('staff.index') }}" class="btn btn-secondary">Clear</a>
                            </form>

                            {{-- RIGHT: Buttons --}}
                            <div class="d-flex" style="gap:10px;">
                                <a href="{{ route('staff.export', request()->query()) }}" class="btn btn-success">
                                    Export Excel
                                </a>

                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal">
                                    Import Excel
                                </button>

                                <a href="" class="btn btn-primary">
                                    + Tambah Data
                                </a>
                            </div>

                        </div>

                        <div class="modal fade" id="importModal">
                            <div class="modal-dialog">
                                <form action="{{ route('staff.import') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title">Import Excel</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">

                                            <div class="mb-3">
                                                <label>Upload File Excel</label>
                                                <input type="file" name="file" class="form-control" required>
                                            </div>

                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary">
                                                Import
                                            </button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>ID Staff</th>
                                    <th>Name</th>
                                    <th>Phone Number</th>
                                    <th>Vehicle Type</th>
                                    <th>Title</th>
                                    <th>Contract Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="align-middle">
                                        <td>{{ $data->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->id_staff }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->vehicle_type }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->contract_type }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ route('staff.show', $item->id_staff) }}" class="btn btn-sm btn-info">View</a>
                                            <a href="{{ route('staff.edit', $item->id_staff) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('staff.destroy', $item->id_staff) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this data?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        {{ $data->links('pagination::bootstrap-5') }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection
