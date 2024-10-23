@extends('admin.layout')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Manage Team Members</h3>
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
                    <a href="#">Manage Team Members</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Manage Team Members</h4>
                            <a href="{{ route('team-members.create') }}" class="btn btn-primary btn-round ms-auto">
                                <i class="fa fa-plus"></i>
                                Add Team Member
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Team</th>
                                        <th>Leader</th>
                                        <th>Members</th>
                                        <th>Project</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Tim</th>
                                        <th>Pemimpin</th>
                                        <th>Anggota</th>
                                        <th>Projek</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($teamMembers->groupBy('team_id') as $teamId => $members)
                                        <tr>
                                            <td>{{ $members[0]->team->name ?? '-' }}</td>
                                            <td>{{ $members[0]->team->leader->name ?? '-' }}</td>
                                            <td>
                                                @foreach ($members as $member)
                                                    {{ $member->employee->name ?? '-' }}<br>
                                                @endforeach
                                            </td>
                                            <td>{{ $members[0]->team->project->name ?? '-' }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('team-members.show', $members[0]->id) }}"
                                                       class="btn btn-link btn-info btn-lg" data-bs-toggle="tooltip"
                                                       title="Show Team Member">
                                                        <i class="fa fa-eye"></i>
                                                    </a>

                                                    <form action="{{ route('team-members.destroy', ['team_id' => $members[0]->team_id, 'employee_id' => $members[0]->employee_id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" data-bs-toggle="tooltip" title="Delete Team Member" class="btn btn-link btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
