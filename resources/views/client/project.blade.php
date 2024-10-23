@extends('client.layouts')
@section('content')
    <div class='container-project'>
        {{-- Cek apakah ada anggota tim --}}
        @if ($teamMembers && $teamMembers->count())
            {{-- Unprocessed Projects --}}
            @if (in_array($teamMembers->first()->team->project->status, ['unprocessed', 'ongoing', 'completed']))
                <div class="container-project-unprocessed">
                    <h2></h2>
                    <div class="project-row">
                        @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                            @if (in_array($members->first()->team->project->status, ['unprocessed', 'ongoing', 'completed']))
                                <div class="project-card unprocessed">
                                    <div class="project-info">
                                        <h3 class="project-title">{{ $members->first()->team->project->name }}</h3>
                                        <p class="client-name"><strong>Client:</strong>
                                            {{ $members->first()->team->project->client->name }}</p>
                                        <p class="deadline"><strong>Deadline:</strong>
                                            {{ \Carbon\Carbon::parse($members->first()->team->project->end_date)->format('d M Y') }}
                                        </p>
                                        <p class="team-name"><strong>Team:</strong> {{ $members->first()->team->name }}</p>
                                        <p class="status"><strong>Status:</strong>
                                            @if (in_array($members->first()->team->project->status, ['unprocessed', 'ongoing', 'completed']))
                                                unprocessed
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Ongoing Projects --}}
            @if (in_array($teamMembers->first()->team->project->status, ['ongoing', 'completed']))
                <div class="arrow">↓</div>
                <div class="container-project-ongoing">
                    <h2></h2>
                    <div class="project-row">
                        @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                            @if (in_array($members->first()->team->project->status, ['ongoing', 'completed']))
                                <div class="project-card ongoing">
                                    <div class="project-info">
                                        <h3 class="project-title">{{ $members->first()->team->project->name }}</h3>
                                        <p class="client-name"><strong>Client:</strong>
                                            {{ $members->first()->team->project->client->name }}</p>
                                        <p class="deadline"><strong>Deadline:</strong>
                                            {{ \Carbon\Carbon::parse($members->first()->team->project->end_date)->format('d M Y') }}
                                        </p>
                                        <p class="team-name"><strong>Team:</strong> {{ $members->first()->team->name }}</p>
                                        <p class="status"><strong>Status:</strong>
                                            ongoing
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Completed Projects --}}
            @if (in_array($teamMembers->first()->team->project->status, ['completed']))
                <div class="arrow">↓</div>
                <div class="container-project-completed">
                    <h2></h2>
                    <div class="project-row">
                        @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                            @if ($members->first()->team->project->status === 'completed')
                                <div class="project-card completed">
                                    <div class="project-info">
                                        <h3 class="project-title">{{ $members->first()->team->project->name }}</h3>
                                        <p class="client-name"><strong>Client:</strong>
                                            {{ $members->first()->team->project->client->name }}</p>
                                        <p class="deadline"><strong>Deadline:</strong>
                                            {{ \Carbon\Carbon::parse($members->first()->team->project->end_date)->format('d M Y') }}
                                        </p>
                                        <p class="team-name"><strong>Team:</strong> {{ $members->first()->team->name }}</p>
                                        <p class="status"><strong>Status:</strong>
                                            {{ ucfirst($members->first()->team->project->status) }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
        @else
            <div class="no-project">
                <p>The project hasn't started yet</p>
            </div>
        @endif
    </div>
@endsection
