@extends('admin.layout')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Project Details</h3>
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
                    <a href="{{ route('projects.index') }}">Projects</a>
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
                        <h4 class="card-title">Project Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Name:</strong>
                                <p>{{ $project->name }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Status:</strong>
                                <p>{{ $project->status ?? 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Deadline:</strong>
                                <p>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->format('Y-m-d') : 'N/A' }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Budget:</strong>
                                <p>{{ $project->budget ? 'Rp ' . number_format($project->budget, 2, ',', '.') : 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong>Client:</strong>
                                <p>{{ $project->client ? $project->client->name : 'N/A' }}</p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
