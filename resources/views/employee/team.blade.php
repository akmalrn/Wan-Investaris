@extends('employee.layouts')
@section('title', 'Team')
@section('content')
<div class="container-teams mt-4">
    @if ($teamMembers && $teamMembers->count())
        <div class="row"> <!-- Flex container for team cards -->
            @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4"> <!-- Responsive columns: 4 on large, 2 on medium, 1 on small screens -->
                    <div class="card h-100"> <!-- Ensuring all cards have equal height -->
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
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
