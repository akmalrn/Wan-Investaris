@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add New Team Member</h3>
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
                        <a href="#">Add Member</a>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Team Member</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('team-members.store') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="team_id">Select Team</label>
                                    <select id="team_id" name="team_id" class="form-control" required>
                                        <option value="">Select Team</option>
                                        @foreach ($teams as $team)
                                            <option value="{{ $team->id }}"
                                                data-leader="{{ $team->leader->name ?? 'No leader assigned' }}">
                                                {{ $team->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" id="leader_container" style="display: none;">
                                    <label>Team Leader</label>
                                    <p id="leader_name" class="form-control-plaintext">-</p>
                                </div>

                                <div class="col-md-4" id="employee_container" style="display: none;">
                                    <label for="employee_id">Select Employees</label>
                                    <div id="employee_selects">
                                        <div class="input-group mb-2">
                                            <select class="form-control employee_id" name="employee_id[]" required
                                                onchange="updateEmployeeOptions(this)">
                                                <option value="">Select Employee</option>
                                                @foreach ($employees as $employee)
                                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    onclick="addEmployee()">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Add Member</button>
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
        document.getElementById('team_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var leaderName = selectedOption.getAttribute('data-leader');

            document.getElementById('leader_name').innerText = leaderName;

            var leaderContainer = document.getElementById('leader_container');
            if (this.value) {
                leaderContainer.style.display = 'block';
                document.getElementById('employee_container').style.display =
                    'block';
            } else {
                leaderContainer.style.display = 'none';
                document.getElementById('employee_container').style.display =
                    'none';
            }

            hideLeaderOption(leaderName);
        });

        function hideLeaderOption(leaderName) {
            document.querySelectorAll('.employee_id').forEach(select => {
                select.querySelectorAll('option').forEach(option => {
                    if (option.text === leaderName) {
                        option.style.display = 'none';
                    } else {
                        option.style.display = 'block';
                    }
                });
            });
        }

        function addEmployee() {
            var employeeSelects = document.getElementById('employee_selects');

            var newSelect = document.createElement('div');
            newSelect.className = 'input-group mb-2';

            newSelect.innerHTML = `
        <select class="form-control employee_id" name="employee_id[]" required onchange="updateEmployeeOptions(this)">
            <option value="">Select Employee</option>
            @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        <div class="input-group-append">
            <button type="button" class="btn btn-outline-secondary" onclick="removeEmployee(this)">-</button>
        </div>
    `;

            employeeSelects.appendChild(newSelect);

            updateEmployeeOptions(newSelect.querySelector('select'));
        }

        function updateEmployeeOptions(selectElement) {
            var selectedValues = Array.from(document.querySelectorAll('.employee_id')).map(select => select.value);
            var leaderName = document.getElementById('leader_name').innerText;

            document.querySelectorAll('.employee_id').forEach(select => {
                select.querySelectorAll('option').forEach(option => {
                    if (selectedValues.includes(option.value) && option.value !== select.value) {
                        option.style.display = 'none';
                    } else if (option.text === leaderName) {
                        option.style.display = 'none';
                    } else {
                        option.style.display = 'block';
                    }
                });
            });
        }

        function removeEmployee(button) {
            var selectGroup = button.parentElement.parentElement;
            selectGroup.remove(); 
            updateEmployeeOptions();
        }
    </script>
@endsection
