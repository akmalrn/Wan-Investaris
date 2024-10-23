    @extends('admin.layout')

    @section('content')
        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h3 class="fw-bold mb-3">Employee Details</h3>
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
                            <a href="{{ route('employees.index') }}">Employees</a>
                        </li>
                        <li class="separator">
                            <i class="icon-arrow-right"></i>
                        </li>
                        <li class="nav-item">
                            <a href="#">Show</a>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Employee Information</h4>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Name:</strong>
                                        <p>{{ $employee->name }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Email:</strong>
                                        <p>{{ $employee->email ?? 'N/A'}}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Phone Number:</strong>
                                        <p>{{ $employee->phone_number ?? 'N/A'}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Hire Date:</strong>
                                        <p>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d M Y') }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Salary:</strong>
                                        <p>Rp {{ number_format($employee->salary, 2, ',', '.') }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Status:</strong>
                                        <p>{{ ucfirst($employee->status ?? 'N/A') }}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>Role:</strong>
                                        <p>{{ ucfirst($employee->role) }}</p>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back to Employees
                                        List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
