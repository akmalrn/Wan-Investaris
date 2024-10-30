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
                                <button class="btn btn-secondary" disabled>You are a member, Only leader</button>
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
                                <button class="btn btn-secondary" disabled>You are a member, Only leader</button>
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

@endsection
