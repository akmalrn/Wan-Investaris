@extends('employee.layouts')
@section('title', 'Project')

@section('content')
<div class="container mt-4">
    @if ($teamMembers->isNotEmpty())
        <!-- Unprocessed Projects -->
        <div class="container-project">
            <h3 class="text-primary">Unprocessed Projects</h3>
            <div class="project-row">
                @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                    @php
                        $project = $members[0]->team->project; // Make sure this is defined
                    @endphp

                    @if ($project && in_array($project->status, ['unprocessed', 'ongoing', 'completed']))
                        <div class="project-card unprocessed">
                            <div class="project-info">
                                <h5 class="project-title">Team: {{ $members[0]->team->name ?? '-' }}</h5>
                                <p class="client-name">Client: {{ $project->client->name ?? '-' }}</p>
                                <p class="project-name">Project: {{ $project->name ?? '-' }}</p>
                                <p class="deadline">Start Date: {{ $project->start_date ?? '-' }}</p>
                                <p class="deadline">End Date: {{ $project->end_date ?? '-' }}</p>
                                <p class="status">Status: <span class="text-danger">Unprocessed</span></p>

                                @if ($isLeader)
                                @if ($project->status === 'unprocessed')
                                    <form action="{{ route('project.updateStatusOngoing', $project->id) }}" method="POST" id="updateStatusForm{{ $project->id }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-primary confirm-button" data-project-id="{{ $project->id }}">Confirm</button>
                                    </form>
                                @endif
                            @elseif ($isMember)
                                <button class="btn btn-secondary" disabled>You are a member, action not allowed</button>
                            @else
                                <button class="btn btn-secondary" disabled>Confirm</button>
                            @endif
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Ongoing Projects -->
        <div class="container-project">
            @if ($project && in_array($project->status, ['ongoing', 'completed']))
            <h3 class="text-primary">Ongoing Projects</h3>
            @endif
            <div class="project-row">
                @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                    @php
                        $project = $members[0]->team->project; // Ensure project is defined
                    @endphp

                    @if ($project && in_array($project->status, ['ongoing', 'completed']))
                        <div class="project-card ongoing">
                            <div class="project-info">
                                <h5 class="project-title">Team: {{ $members[0]->team->name ?? '-' }}</h5>
                                <p class="client-name">Client: {{ $project->client->name ?? '-' }}</p>
                                <p class="project-name">Project: {{ $project->name ?? '-' }}</p>
                                <p class="deadline">Start Date: {{ $project->start_date ?? '-' }}</p>
                                <p class="deadline">End Date: {{ $project->end_date ?? '-' }}</p>
                                <p class="status">Status: <span class="text-warning">Ongoing</span></p>

                                @if ($isLeader)
                                @if ($project->status === 'unprocessed')
                                    <form action="{{ route('project.updateStatusOngoing', $project->id) }}" method="POST" id="updateStatusForm{{ $project->id }}">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-primary confirm-button" data-project-id="{{ $project->id }}">Confirm</button>
                                    </form>
                                @elseif ($project->status === 'ongoing')
                                    <form id="completeStatusForm{{ $project->id }}" action="{{ route('project.updateStatusCompleted', $project->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="button" class="btn btn-primary confirm-complete-button" data-project-id="{{ $project->id }}">Complete</button>
                                    </form>
                                @endif
                            @elseif ($isMember)
                                <button class="btn btn-secondary" disabled>You are a member, action not allowed</button>
                            @else
                                <button class="btn btn-secondary" disabled>Confirm</button>
                            @endif

                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Completed Projects -->
        <div class="container-project">
            @if ($project && in_array($project->status, ['completed']))
            <h3 class="text-primary">Completed Projects</h3>
            @endif
            <div class="project-row">
                @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                    @php
                        $project = $members[0]->team->project; // Ensure project is defined
                    @endphp

                    @if ($project && $project->status === 'completed')
                        <div class="project-card completed">
                            <div class="project-info">
                                <h5 class="project-title">Team: {{ $members[0]->team->name ?? '-' }}</h5>
                                <p class="client-name">Client: {{ $project->client->name ?? '-' }}</p>
                                <p class="project-name">Project: {{ $project->name ?? '-' }}</p>
                                <p class="deadline">Start Date: {{ $project->start_date ?? '-' }}</p>
                                <p class="deadline">End Date: {{ $project->end_date ?? '-' }}</p>
                                <p class="status">Status: <span class="text-success">Completed</span></p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    @else
        <p>No team members found.</p>
    @endif
</div>



    <!-- JavaScript for Confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Confirmation for Confirm Button
            document.querySelectorAll('.confirm-button').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-project-id');

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
                            document.getElementById('updateStatusForm' + projectId)
                        .submit();
                            Swal.fire({
                                title: "Success!",
                                text: "Project status has been updated.",
                                icon: "success"
                            });
                        }
                    });
                });
            });

            // Confirmation for Complete Button
            document.querySelectorAll('.confirm-complete-button').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-project-id');

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
                            document.getElementById('completeStatusForm' + projectId)
                                .submit();
                            Swal.fire({
                                title: "Success!",
                                text: "Project has been marked as completed.",
                                icon: "success"
                            });
                        }
                    });
                });
            });
        });
    </script>

@endsection
