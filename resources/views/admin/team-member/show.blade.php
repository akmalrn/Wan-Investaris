@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Team Member Details</h3>
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
                        <a href="#">Team Members</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Details</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Team Member Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="col-md">
                                <label>Team Name:</label>
                                <p class="mb-3">{{ $teamMember->team->name ?? '-' }}</p>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <label>Leader:</label>
                                    <p class="mb-3">{{ $leaderName }}</p>
                                </div>
                                <div class="col-md">
                                    <label>Team Members:</label>
                                    <p class="mb-3">
                                        @foreach ($teamMembers as $member)
                                            {{ $member->employee->name ?? '-' }}<br>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <label>Client:</label>
                                    <p class="mb-3">{{ $teamMember->team->project->client->name ?? '-' }}</p>
                                </div>
                                <div class="col-md">
                                    <label>Project Name:</label>
                                    <p class="mb-3">{{ $teamMember->team->project->name ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <label>Start Date:</label>
                                    <p class="mb-3">
                                        {{ $teamMember->team->project->start_date ? \Carbon\Carbon::parse($teamMember->team->project->start_date)->format('d M Y') : '-' }}
                                    </p>
                                </div>
                                <div class="col-md">
                                    <label>End Date:</label>
                                    <p class="mb-3">
                                        {{ $teamMember->team->project->end_date ? \Carbon\Carbon::parse($teamMember->team->project->end_date)->format('d M Y') : '-' }}
                                    </p>
                                </div>
                                <div class="col-md">
                                    <label>Project Name:</label>
                                    <p class="mb-3">{{ $teamMember->team->project->status ?? '-' }}</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('team-members.index') }}" class="btn btn-secondary">Back to Team
                                    Members</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
