<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\admin\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employee.index');
    }

    //Project
    public function project()
    {
        // Mendapatkan ID employee yang sedang login
        $employeeId = Auth::guard('employees')->id();

        // Mengambil data anggota tim di mana employee yang login adalah leader atau bagian dari team
        $teamMembers = TeamMember::with('team.leader', 'team.members.employee', 'team.project.client')
            ->whereHas('team', function ($query) use ($employeeId) {
                // Filter tim di mana leader_id atau anggota tim memiliki employee_id yang sama dengan employee yang login
                $query->where('leader_id', $employeeId)
                      ->orWhereHas('members', function ($subQuery) use ($employeeId) {
                          $subQuery->where('employee_id', $employeeId);
                      });
            })
            ->get();

        return view('employee.project', compact('teamMembers'));
    }



    public function updateStatusOngoing($id)
    {
        // Cari proyek berdasarkan ID
        $project = Project::findOrFail($id);

        // Update status proyek menjadi 'Progress'
        $project->status = 'ongoing';
        $project->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Project status updated to Progress.');
    }

    public function updateStatusCompleted($id)
    {
        // Cari proyek berdasarkan ID
        $project = Project::findOrFail($id);

        // Update status proyek menjadi 'Progress'
        $project->status = 'completed';
        $project->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Project status updated to Progress.');
    }

    public function team()
    {
        // Mengambil semua data anggota tim beserta relasi ke tim, leader, dan anggota
        $teamMembers = TeamMember::with(['team.leader', 'team.members.employee'])->get();

        return view('employee.team', compact('teamMembers'));
    }

}
