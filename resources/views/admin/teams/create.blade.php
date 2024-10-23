@extends('admin.layout')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add New Team</h3>
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
                    <a href="{{ route('teams.index') }}">Teams</a>
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
                        <h4 class="card-title">Add New Team</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('teams.store') }}" method="POST">
                            @csrf

                            <!-- Name Input -->
                            <div class="form-group">
                                <label for="name">Team Name</label>
                                <input id="name" type="text" class="form-control" name="name" required>
                            </div>

                            <!-- Project Selection -->
                            <div class="form-group">
                                <label for="project_id">Project</label>
                                <select id="project_id" name="project_id" class="form-control" required>
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Leader Selection -->
                            <div class="form-group">
                                <label for="leader_id">Team Leader</label>
                                <select id="leader_id" name="leader_id" class="form-control" required>
                                    <option value="">Select Leader</option>
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                                <a href="{{ route('teams.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
