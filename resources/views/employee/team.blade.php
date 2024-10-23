@extends('employee.layouts')
@section('title', 'Team')
@section('content')
<div class="container mt-4">
    @if ($teamMembers && $teamMembers->count())
        <div class="d-flex flex-wrap"> <!-- Flex container for team cards -->
            @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                <div class="card mb-4 m-2" style="min-width: 300px; flex: 1 1 200px;"> <!-- Each card with responsive size -->
                    <div class="card-body">
                        <h5 class="card-title">Team: {{ $members->first()->team->name }}</h5>
                        <p class="card-text"><strong>Leader:</strong> {{ $members->first()->team->leader->name }}</p>
                        <p class="card-text"><strong>Employees:</strong></p>
                        <ul class="list-group mb-3">
                            @foreach ($members as $member)
                                <li class="list-group-item">{{ $member->employee->name }}</li>
                            @endforeach
                        </ul>
                        <div class="project-info">
                            <p class="card-text"><strong>Project:</strong> {{ $members->first()->team->project->name }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $members->first()->team->project->status }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
