@extends('admin.layout')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables.Net</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Datatables</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Add Row</h4>
                                <a href="{{ route('employees.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Employee
                                </a>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Posisi</th>
                                            <th>Status</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->position }}</td>
                                            <td>{{ $employee->status }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip" title="Show employee" data-original-title="Show employee">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <form action="{{ route('employees.edit', $employee->id) }}" method="GET" style="display: inline;">
                                                        @csrf
                                                        <button type="submit" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit employee">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </form>

                                                    <form id="delete-form-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" data-bs-toggle="tooltip" title="Remove" class="btn btn-link btn-danger" onclick="confirmDelete({{ $employee->id }})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
