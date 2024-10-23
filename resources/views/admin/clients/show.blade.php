@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Client Details</h3>
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
                        <a href="{{ route('clients.index') }}">Clients</a>
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
                            <h4 class="card-title">Client Information</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Name:</strong>
                                    <p>{{ $client->name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Email:</strong>
                                    <p>{{ $client->email ?? 'N/A'}}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Phone Number:</strong>
                                    <p>{{ $client->phone_number ?? 'N/A'}}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Contact Person:</strong>
                                    <p>{{ $client->contact_person ?? 'N/A'}}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Address:</strong>
                                    <p>{{ $client->address ?? 'N/A'}}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Project Count:</strong>
                                    <p>{{ $client->project_count }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <strong>Role:</strong>
                                    <p>{{ ucfirst($client->role) }}</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back to Clients List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
