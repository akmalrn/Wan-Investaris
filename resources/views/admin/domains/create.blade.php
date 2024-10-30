@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add New Domain</h3>
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
                        <a href="{{ route('domains.index') }}">Domains</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Add</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Domain</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('domains.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md">
                                    <label for="name">Domain Name</label>
                                    <input id="name" type="text" class="form-control" name="name" required>
                                </div>

                                <div class="col-md mt-3">
                                    <label for="url">URL</label>
                                    <input id="url" type="text" class="form-control" name="url" required>
                                </div>

                                <div class="col-md mt-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description"></textarea>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md">
                                        <label for="start_date">Registration Date</label>
                                        <input id="start_date" type="date" class="form-control" name="start_date">
                                    </div>

                                    <div class="col-md">
                                        <label for="end_date">Expiration Date</label>
                                        <input id="end_date" type="date" class="form-control" name="end_date">
                                    </div>
                                </div>

                                <div class="col-md mt-3">
                                    <label for="project_id">Project</label>
                                    <select id="project_id" name="project_id" class="form-control">
                                        <option value="">Select Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md mt-3">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                        <option value="pending">Pending</option>
                                    </select>
                                </div>

                                <div class="col-md mt-3">
                                    <label for="dns">DNS</label>
                                    <input id="dns" type="text" class="form-control" name="dns">
                                </div>

                                <div class="col-md mt-3">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                    <a href="{{ route('domains.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
