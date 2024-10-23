@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Project</h3>
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
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Project</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('projects.update', $project->id) }}" method="POST"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="client_id">Client</label>
                                    <select id="client_id" name="client_id" class="form-control" required>
                                        <option value="">Select Client</option>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" {{ $client->id == $project->client_id ? 'selected' : '' }}>
                                                {{ $client->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Project Name</label>
                                    <input id="name" type="text" class="form-control" name="name"
                                        value="{{ $project->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input id="start_date" type="date" class="form-control" name="start_date"
                                        value="{{ $project->start_date }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input id="end_date" type="date" class="form-control" name="end_date"
                                        value="{{ $project->end_date }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="unprocessed" {{ $project->status == 'unprocessed' ? 'selected' : '' }}>Unprocessed</option>
                                        <option value="ongoing" {{ $project->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                        <option value="completed" {{ $project->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $project->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="budget">Budget</label>
                                    <input id="budget" type="number" class="form-control" name="budget"
                                        value="{{ $project->budget }}" step="0.01">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('projects.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
