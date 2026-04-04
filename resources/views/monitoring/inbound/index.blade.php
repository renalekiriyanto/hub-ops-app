@extends('layouts.main')
@section('title', 'List Data Monitoring Inbound')
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
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="m-0"><i class="bi bi-funnel"></i> Filter Data</h5>
                            {{-- RIGHT: Buttons --}}
                            <div class="d-flex" style="gap:10px;">
                                <a href="{{ route('monitoring.inbound.export', request()->query()) }}" class="btn btn-success">
                                    Export Excel
                                </a>

                                <a href="{{ route('monitoring.inbound.create') }}" class="btn btn-primary">
                                    + Add new record
                                </a>
                            </div>
                        </div>

                        {{-- Filter Form --}}
                        <form method="GET" action="{{ route('monitoring.inbound.index') }}">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-3">
                                    <label class="form-label text-muted small mb-1">Search Driver Name</label>
                                    <input type="text" name="search" class="form-control" placeholder="Search name..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label text-muted small mb-1">Start Date</label>
                                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label text-muted small mb-1">End Date</label>
                                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label text-muted small mb-1">Start Arrival Time</label>
                                    <input type="datetime-local" name="start_arrival_time" class="form-control" value="{{ request('start_arrival_time') }}">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label text-muted small mb-1">End Arrival Time</label>
                                    <input type="datetime-local" name="end_arrival_time" class="form-control" value="{{ request('end_arrival_time') }}">
                                </div>
                                <div class="col-md-1 d-flex gap-2">
                                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                                    <a href="{{ route('monitoring.inbound.index') }}" class="btn btn-secondary w-100">Clear</a>
                                </div>
                            </div>
                        </form>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Date</th>
                                    <th>Arrival Time</th>
                                    <th>Slot Name</th>
                                    <th>Total Bag</th>
                                    <th>Total Bulky</th>
                                    <th>Total Order</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="align-middle">
                                        <td>{{ $data->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td>{{ $item->arrival_time }}</td>
                                        <td>{{ $item->slot_name }}</td>
                                        <td>{{ $item->total_bag }}</td>
                                        <td>{{ $item->total_bulky }}</td>
                                        <td>{{ $item->total_order }}</td>
                                        <td>
                                            <a href="{{ route('monitoring.inbound.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('monitoring.inbound.destroy', $item->id) }}" method="POST" class="d-inline form-delete">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-delete">Delete</button>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.form-delete');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                })
            });
        });
    });
</script>
@endpush
