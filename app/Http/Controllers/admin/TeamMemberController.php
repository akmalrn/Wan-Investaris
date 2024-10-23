<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Team;
use App\Models\admin\TeamMember;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamMemberController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teamMembers = TeamMember::with('team.leader', 'team.members.employee')->get();
        return view('admin.team-member.index', compact('teamMembers', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $teams = Team::all();
        $employees = Employee::all();
        return view('admin.team-member.create', compact('teams', 'employees', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'team_id' => 'required|exists:teams,id',
            'employee_id' => 'required|array',
            'employee_id.*' => 'exists:employees,id',
        ]);

        foreach ($request->employee_id as $employeeId) {
            TeamMember::create([
                'team_id' => $request->team_id,
                'employee_id' => $employeeId,
            ]);
        }

        return redirect()->route('team-members.index')->with('success', 'Team members added successfully.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $teamMember = TeamMember::with(['team.project', 'employee'])->findOrFail($id);
        $teamMembers = TeamMember::where('team_id', $teamMember->team_id)->with('employee')->get();
        $teamId = $teamMember->team->id;
        $leaderName = $teamMember->team->leader->name ?? '-';

        return view('admin.team-member.show', compact('teamMember', 'user', 'teamMembers', 'teamId', 'leaderName'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $team = Team::with('members')->findOrFail($id);
        $employees = Employee::all();
        return view('admin.team-member.edit', compact('team', 'employees', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        $team = Team::findOrFail($id);
        $team->members()->sync($request->employee_id);

        return redirect()->route('team-members.index')->with('success', 'Team members updated successfully.');
    }

    public function destroy($team_id)
    {
        // Hapus semua anggota tim yang terkait dengan team_id
        TeamMember::where('team_id', $team_id)->delete();

        return redirect()->route('team-members.index')->with('success', 'All team members removed successfully.');
    }


}
