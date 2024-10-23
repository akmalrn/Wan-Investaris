@extends('admin.layout')

@section('content')

    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Employee</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('employees.index') }}">Employee</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Employee</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="name">Name</label>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ $employee->name }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="password">Password</label>
                                            <input id="password" type="password" class="form-control" name="password" autocomplete="off">
                                            <small class="form-text text-muted">Leave blank to keep current password.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="position">Position</label>
                                            <input id="position" type="text" class="form-control" name="position" value="{{ $employee->position }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="email">Email</label>
                                            <input id="email" type="email" class="form-control" name="email" value="{{ $employee->email }}" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="phone_number">Phone Number</label>
                                            <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $employee->phone_number }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="hire_date">Hire Date</label>
                                            <input id="hire_date" type="date" class="form-control" name="hire_date" value="{{ $employee->hire_date }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="salary">Salary</label>
                                            <input id="salary" type="number" class="form-control" name="salary" value="{{ $employee->salary }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="status">Status</label>
                                            <select id="status" class="form-control" name="status">
                                                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                                                <option value="day off" {{ $employee->status == 'day off' ? 'selected' : '' }}>Day Off</option>
                                                <option value="resign" {{ $employee->status == 'resign' ? 'selected' : '' }}>Resign</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('employees.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
