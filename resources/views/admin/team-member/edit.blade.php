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
                        <a href="{{ route('team-members.index') }}">Team Member</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Team</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Team Members</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('team-members.update', $teamMember->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="team_id">Select Team</label>
                                    <select id="team_id" name="team_id" class="form-control" required disabled>
                                        <option value="{{ $teamId }}">{{ $teamMember->team->name }}</option>
                                    </select>
                                </div>

                                <div class="form-group" id="leader_container">
                                    <label>Team Leader</label>
                                    <p id="leader_name" class="form-control-plaintext">{{ $leaderName }}</p>
                                </div>

                                <div class="col-md-4" id="employee_container">
                                    <label for="employee_id">Team Members</label>
                                    <div id="employee_selects">
                                        @foreach ($teamMembers as $member)
                                            <div class="input-group mb-2">
                                                <select class="form-control employee_id" name="employee_id[]" required>
                                                    <option value="">Select Employee</option>
                                                    @foreach ($employees as $employee)
                                                        @if ($employee->id !== $teamMember->team->leader->id)
                                                            <option value="{{ $employee->id }}"
                                                                {{ $member->employee_id === $employee->id ? 'selected' : '' }}>
                                                                {{ $employee->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        onclick="removeEmployee(this)">-</button>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-outline-secondary" onclick="addEmployee()">Add
                                        Member</button>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Team Members</button>
                                    <a href="{{ route('team-members.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function addEmployee() {
            var employeeSelects = document.getElementById('employee_selects');

            var leaderId = {{ $teamMember->team->leader->id ?? 'null' }};

            var existingMemberIds = @json($teamMembers->pluck('employee_id'));

            var newSelect = document.createElement('div');
            newSelect.className = 'input-group mb-2';

            var employeeOptions = '';
            @foreach ($employees as $employee)
                if ({{ $employee->id }} !== leaderId && !existingMemberIds.includes({{ $employee->id }})) {
                    employeeOptions += `<option value="{{ $employee->id }}">{{ $employee->name }}</option>`;
                }
            @endforeach

            newSelect.innerHTML = `
        <select class="form-control employee_id" name="employee_id[]" required>
            <option value="">Select Employee</option>
            ${employeeOptions}
        </select>
        <div class="input-group-append">
            <button type="button" class="btn btn-outline-secondary" onclick="removeEmployee(this)">-</button>
        </div>
    `;

            employeeSelects.appendChild(newSelect);
        }

        function removeEmployee(button) {
            var selectGroup = button.closest('.input-group');
            selectGroup.remove();
        }
    </script>
@endsection
