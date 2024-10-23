@extends('employee.layouts')
@section('title', 'Project')

@section('content')
    <div class="container mt-4">
        @if ($teamMembers->isNotEmpty())
            <div class="mb-4">
                <h3 class="text-primary">Unprocessed Projects</h3>
                <div class="d-flex flex-wrap">
                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                        @php
                            $project = $members[0]->team->project;
                        @endphp

                        @if (in_array($project->status, ['unprocessed', 'ongoing', 'completed']))
                            <div class="card border-info m-2" style="min-width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>Team:</strong> {{ $members[0]->team->name ?? '-' }}
                                        <span class="text-muted">({{ $project->id }})</span>
                                    </h5>
                                    <p class="card-text"><strong>Client:</strong> {{ $project->client->name ?? '-' }}</p>
                                    <p class="card-text"><strong>Project:</strong> {{ $project->name ?? '-' }}</p>
                                    <p class="card-text"><strong>Start Date:</strong> {{ $project->start_date ?? '-' }}</p>
                                    <p class="card-text"><strong>End Date:</strong> {{ $project->end_date ?? '-' }}</p>
                                    <p class="card-text"><strong>Status:</strong> <span
                                            class="text-danger">unprocessed</span></p>
                                    @if ($project->status === 'unprocessed')
                                        <form action="{{ route('project.updateStatusOngoing', $project->id) }}"
                                            method="POST" class="d-inline" id="updateStatusForm{{ $project->id }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-primary confirm-button"
                                                data-project-id="{{ $project->id }}">Confirm</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                    @php
                        $project = $members[0]->team->project;
                    @endphp

                    @if (in_array($project->status, ['ongoing', 'completed']))
                        <h3 class="text-primary">Ongoing Projects</h3>
                    @endif
                @endforeach
                <div class="d-flex flex-wrap">
                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                        @php
                            $project = $members[0]->team->project;
                        @endphp

                        @if (in_array($project->status, ['ongoing', 'completed']))
                            <div class="card border-warning m-2" style="min-width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>Team:</strong> {{ $members[0]->team->name ?? '-' }}
                                        <span class="text-muted">({{ $project->id }})</span>
                                    </h5>
                                    <p class="card-text"><strong>Client:</strong> {{ $project->client->name ?? '-' }}</p>
                                    <p class="card-text"><strong>Project:</strong> {{ $project->name ?? '-' }}</p>
                                    <p class="card-text"><strong>Start Date:</strong> {{ $project->start_date ?? '-' }}</p>
                                    <p class="card-text"><strong>End Date:</strong> {{ $project->end_date ?? '-' }}</p>
                                    <p class="card-text"><strong>Status:</strong> <span class="text-warning">ongoing</span>
                                    </p>

                                    @if ($project->status === 'ongoing')
                                        <form action="{{ route('project.updateStatusCompleted', $project->id) }}"
                                            method="POST" class="d-inline" id="completeStatusForm{{ $project->id }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-primary confirm-complete-button"
                                                data-project-id="{{ $project->id }}">Complete</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="mb-4">
                @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                    @php
                        $project = $members[0]->team->project;
                    @endphp

                    @if (in_array($project->status, ['completed']))
                        <h3 class="text-primary">Completed Projects</h3>
                    @endif
                @endforeach
                <div class="d-flex flex-wrap">
                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                        @php
                            $project = $members[0]->team->project;
                        @endphp

                        @if ($project->status === 'completed')
                            <div class="card border-success m-2" style="min-width: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <strong>Team:</strong> {{ $members[0]->team->name ?? '-' }}
                                        <span class="text-muted">({{ $project->id }})</span>
                                    </h5>
                                    <p class="card-text"><strong>Client:</strong> {{ $project->client->name ?? '-' }}</p>
                                    <p class="card-text"><strong>Project:</strong> {{ $project->name ?? '-' }}</p>
                                    <p class="card-text"><strong>Start Date:</strong> {{ $project->start_date ?? '-' }}</p>
                                    <p class="card-text"><strong>End Date:</strong> {{ $project->end_date ?? '-' }}</p>
                                    <p class="card-text"><strong>Status:</strong> <span
                                            class="text-success">completed</span></p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.confirm-button').forEach(button => {
            button.addEventListener('click', function() {
                const projectId = this.getAttribute('data-project-id');
                const leaderId = {{ $teamMembers->first()->team->leader_id }};
                const employeeId = {{ auth()->user()->id }};

                if (employeeId !== leaderId) {
                    Swal.fire({
                        title: 'Access Denied',
                        text: 'Only the team leader can update the project status.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, confirm it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form
                        document.getElementById('updateStatusForm' + projectId).submit();

                        // Show success message
                        Swal.fire({
                            title: "Success!",
                            text: "Project status has been updated.",
                            icon: "success"
                        });
                    }
                });
            });
        });

        document.querySelectorAll('.confirm-complete-button').forEach(button => {
            button.addEventListener('click', function() {
                const projectId = this.getAttribute('data-project-id');
                const leaderId = {{ $teamMembers->first()->team->leader_id }};
                const employeeId = {{ auth()->user()->id }};

                if (employeeId !== leaderId) {
                    Swal.fire({
                        title: 'Access Denied',
                        text: 'Only the team leader can update the project status.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    return;
                }

                Swal.fire({
                    title: "Are you sure?",
                    text: "This project will be marked as completed!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, complete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form
                        document.getElementById('completeStatusForm' + projectId).submit();

                        // Show success message
                        Swal.fire({
                            title: "Success!",
                            text: "Project has been marked as completed.",
                            icon: "success"
                        });
                    }
                });
            });
        });
    </script>
@endsection
