@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Team</h3>
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
                        <a href="#">Edit</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Team</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('teams.update', $team->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <!-- Team Name -->
                                <div class="form-group">
                                    <label for="name">Team Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $team->name) }}" required>
                                </div>

                                <!-- Project ID -->
                                <div class="form-group">
                                    <label for="project_id">Project ID</label>
                                    <select id="project_id" class="form-control" name="project_id" required>
                                        <option value="">Select Project</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}" {{ $project->id == $team->project_id ? 'selected' : '' }}>
                                                {{ $project->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Leader ID -->
                                <div class="form-group">
                                    <label for="leader_id">Leader</label>
                                    <select id="leader_id" class="form-control" name="leader_id" required>
                                        <option value="">Select Leader</option>
                                        @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}" {{ $employee->id == $team->leader_id ? 'selected' : '' }}>
                                                {{ $employee->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
