@extends('layouts.main')
@section('title', 'List Data Surat Cuti')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="d-flex justify-content-between mb-3">

                            {{-- LEFT: Search --}}
                            <form method="GET" action="" class="d-flex" style="gap:10px;">
                                <input type="text" name="search" class="form-control" placeholder="Search courier...">
                                <button class="btn btn-primary">
                                    Search
                                </button>
                            </form>

                            {{-- RIGHT: Buttons --}}
                            <div class="d-flex" style="gap:10px;">
                                <a href="" class="btn btn-success">
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
                                <form action="" method="POST" enctype="multipart/form-data">
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
                                    <th>Task</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-danger">55%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar text-bg-warning" style="width: 70%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-warning">70%</span>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-primary" style="width: 30%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-primary">30%</span>
                                    </td>
                                </tr>
                                <tr class="align-middle">
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-success" style="width: 90%"></div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge text-bg-success">90%</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item">
                                <a class="page-link" href="#">&laquo;</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@endsection
