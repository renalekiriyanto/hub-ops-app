@extends('layouts.main')
@section('title', 'Driver')
@section('content')
    <div class="main-panel" x-data="driverPage()">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Fleet Overview</h4>
                            <p class="card-description">
                                List rider/driver assignment task, and for monitoring them.
                            </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Driver ID</th>
                                        <th>Driver Name</th>
                                        <th>Vehicle Type</th>
                                        <th>Contract Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-if="loading">
                                        <tr>
                                            <td colspan="5" class="text-center">Loading...</td>
                                        </tr>
                                    </template>

                                    <template x-for="driver in drivers" :key="driver.driver_id">
                                        <tr>
                                            <td x-text="driver.driver_id"></td>
                                            <td x-text="driver.name"></td>
                                            <td x-text="driver.vehicle_type"></td>
                                            <td x-text="driver.contract_type"></td>
                                            <td>
                                                <span class="badge"
                                                    :class="driver.status == 1 ? 'bg-success' : 'bg-danger'"
                                                    x-text="driver.status == 1 ? 'Active' : 'Inactive'">
                                                </span>
                                            </td>
                                        </tr>
                                    </template>

                                    <template x-if="!loading && drivers.length === 0">
                                        <tr>
                                            <td colspan="5" class="text-center">Data kosong</td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal import data --}}
        <div class="modal fade" id="importModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('driver.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Import Data Driver</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">
                                    Upload File Excel
                                </label>

                                <input type="file" name="file_import" class="form-control" accept=".xlsx,.xls" required>

                                <small class="text-muted">
                                    Format: .xlsx atau .xls
                                </small>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Batal
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Import
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                    {{ Carbon\Carbon::now()->format('Y') }}
                    <a href="https://lynk.id/renalekiriyanto" target="_blank">Renal Eki Riyanto</a>. All rights
                    reserved.</span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <script src="{{ asset('assets/js/fleet-overview/index.js') }}"></script>
@endsection
