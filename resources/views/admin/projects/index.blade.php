@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">DataTables</h3>
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
                        <a href="#">Projects</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Project List</h4>
                                <a href="{{ route('projects.create') }}" class="btn btn-primary btn-round ms-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Project
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Project Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Budget</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Client</th>
                                            <th>Project Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Budget</th>
                                            <th style="width: 10%; text-align:center">Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($projects as $project)
                                            <tr>
                                                <td>{{ $project->client->name ?? '-' }}</td>
                                                <td>{{ $project->name }}</td>
                                                <td>{{ $project->start_date }}</td>
                                                <td>{{ $project->end_date }}</td>
                                                <td>{{ ucfirst($project->status) }}</td>
                                                <td>Rp. {{ number_format($project->budget, 2, ',', '.') }}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <a href="{{ route('projects.show', $project->id) }}"
                                                           class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip"
                                                           title="Show project" data-original-title="Show project">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <form action="{{ route('projects.edit', $project->id) }}"
                                                              method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip" title=""
                                                                    class="btn btn-link btn-primary btn-lg"
                                                                    data-original-title="Edit project">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form id="delete-form-{{ $project->id }}" action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Delete Project" class="btn btn-link btn-danger" onclick="confirmDelete({{ $project->id }})">
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
