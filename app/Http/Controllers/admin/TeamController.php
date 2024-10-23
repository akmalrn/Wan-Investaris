<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\admin\Team;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $teams = Team::with(['project', 'leader'])->get();
        return view('admin.teams.index', compact('teams', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $projects = Project::all();
        $employees = Employee::all();
        return view('admin.teams.create', compact('projects', 'employees', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'leader_id' => 'required|exists:employees,id',
        ]);

        Team::create([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'leader_id' => $request->leader_id,
            'members_id' => $request->members_id, // Pastikan members_id ada dalam form
        ]);

        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $team = Team::findOrFail($id);
        $projects = Project::all();
        $employees = Employee::all();
        return view('admin.teams.edit', compact('employees', 'projects', 'user', 'team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'leader_id' => 'required|exists:employees,id',
        ]);

        $team->update([
            'name' => $request->name,
            'project_id' => $request->project_id,
            'leader_id' => $request->leader_id,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }

    public function show($id)
    {
        $user = Auth::user();
        $team = Team::findOrFail($id);
        return view('admin.teams.show', compact('user', 'team'));
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }
}
