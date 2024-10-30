<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\admin\ProjectNotification;
use App\Models\admin\Team;
use App\Models\admin\TeamMember;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::guard('employees')->id();

        // Ambil notifikasi untuk anggota tim yang sedang login
        $notifications = ProjectNotification::where(function ($query) use ($userId) {
            $query->where('team_member_id', $userId) // Memeriksa team_member_id
                ->orWhereHas('teamMember', function ($q) use ($userId) {
                    $q->where('employee_id', $userId); // Memeriksa employee_id dalam relasi
                })
                ->orWhere('leader_id', $userId); // Ambil juga notifikasi yang ditujukan untuk leader
        })
            ->orderBy('created_at', 'desc')
            ->get();

        // Tandai semua notifikasi sebagai dibaca
        ProjectNotification::where(function ($query) use ($userId) {
            $query->where('team_member_id', $userId)
                ->orWhereHas('teamMember', function ($q) use ($userId) {
                    $q->where('employee_id', $userId);
                });
        })
            ->where('is_read', false)
            ->update(['is_read' => true]);

            $employeesCount = Employee::count();
            $clientsCount = Client::count();
            $projectsCount = Project::count();
            $projectsStatusCompleted = Project::where('status', 'completed')->count();

        return view('employee.index', compact('notifications', 'employeesCount', 'clientsCount', 'projectsCount', 'projectsStatusCompleted'));
    }

    // Project
    public function projectLeader(Request $request)
    {
        // Mendapatkan ID employee yang sedang login
        $userId = Auth::guard('employees')->id(); // Ambil ID pengguna yang sedang login
        $projectId = $request->input('project_id');

        // Ambil notifikasi untuk anggota tim yang sedang login
        $notifications = ProjectNotification::where(function ($query) use ($userId) {
            $query->where('team_member_id', $userId)
                ->orWhereHas('teamMember', function ($q) use ($userId) {
                    $q->where('employee_id', $userId);
                })
                ->orWhere('leader_id', $userId);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        // Ambil semua TeamMembers yang terkait dengan tim dan proyek jika userId adalah leader_id
        $teamMembersQuery = TeamMember::with(['team.leader', 'team.members.employee', 'team.project.client'])
            ->whereHas('team', function ($query) use ($userId) {
                $query->where('leader_id', $userId); // Filter berdasarkan leader_id yang sama dengan userId
            });

        // Jika project_id ada, tambahkan filter berdasarkan project_id
        if ($projectId) {
            $teamMembersQuery->whereHas('team.project', function ($query) use ($projectId) {
                $query->where('id', $projectId);
            });
        }

        // Ambil hasil akhir
        $teamMembers = $teamMembersQuery->get();

        // Cek apakah pengguna yang sedang login adalah anggota tim atau pemimpin tim
        $isMember = $teamMembers->contains(function ($member) use ($userId) {
            return $member->employee_id === $userId; // Cek jika userId sama dengan employee_id anggota tim
        });

        $isLeader = $teamMembers->contains(function ($member) use ($userId) {
            return $member->team->leader_id === $userId; // Cek jika userId sama dengan leader_id tim
        });

        return view('employee.project-leader', compact('teamMembers', 'notifications', 'isMember', 'isLeader'));
    }


    public function projectMember(Request $request)
    {
        // Mendapatkan ID employee yang sedang login
        $userId = Auth::guard('employees')->id(); // Ambil ID pengguna yang sedang login
        $projectId = $request->input('project_id');

        // Ambil notifikasi untuk anggota tim yang sedang login
        $notifications = ProjectNotification::where(function ($query) use ($userId) {
            $query->where('team_member_id', $userId)
                ->orWhereHas('teamMember', function ($q) use ($userId) {
                    $q->where('employee_id', $userId);
                })
                ->orWhere('leader_id', $userId);
        })
        ->orderBy('created_at', 'desc')
        ->get();

        // Ambil semua TeamMembers yang berhubungan dengan tim dan sesuai dengan employee_id yang sedang login
        $teamMembersQuery = TeamMember::with(['team.leader', 'team.members.employee', 'team.project.client'])
            ->where('employee_id', $userId); // Filter berdasarkan employee_id yang sedang login

        // Jika project_id ada, tambahkan filter berdasarkan project_id
        if ($projectId) {
            $teamMembersQuery->whereHas('team.project', function ($query) use ($projectId) {
                $query->where('id', $projectId);
            });
        }

        // Ambil hasil akhir
        $teamMembers = $teamMembersQuery->get();

        // Cek apakah pengguna yang sedang login adalah anggota tim atau pemimpin tim
        $isMember = $teamMembers->contains(function ($member) use ($userId) {
            return $member->employee_id === $userId; // Cek jika userId sama dengan employee_id anggota tim
        });

        $isLeader = $teamMembers->contains(function ($member) use ($userId) {
            return $member->team->leader_id === $userId; // Cek jika userId sama dengan leader_id tim
        });

        return view('employee.project-member', compact('teamMembers', 'notifications', 'isMember', 'isLeader'));
    }

    // Team
    public function team()
    {
        // Mengambil semua data anggota tim beserta relasi ke tim, leader, dan anggota
        $teamMembers = TeamMember::with(['team.leader', 'team.members.employee'])->get();

        // Mengambil ID employee yang sedang login
        $employeeId = Auth::guard('employees')->id();

        // Mengambil notifikasi untuk employee yang sedang login
        $notifications = ProjectNotification::whereHas('teamMember', function ($query) use ($employeeId) {
            $query->where('employee_id', $employeeId);
        })
            ->orWhere('leader_id', $employeeId) // Tambahkan ini untuk mengambil notifikasi jika employee adalah leader
            ->orderBy('created_at', 'desc')
            ->get();

        return view('employee.team', compact('teamMembers', 'notifications'));
    }

    public function updateStatusOngoing($id)
    {
        $project = Project::find($id);

        if ($project && $project->status === 'unprocessed') {
            $project->status = 'ongoing';
            $project->save(); // Simpan perubahan ke database

            return redirect()->back()->with('success', 'Project status updated to ongoing');
        }

        return redirect()->back()->with('error', 'Failed to update project status');
    }

    public function updateStatusCompleted($id)
    {
        $project = Project::find($id);

        if ($project && $project->status === 'ongoing') {
            $project->status = 'completed';
            $project->save(); // Simpan perubahan ke database

            return redirect()->back()->with('success', 'Project status updated to completed');
        }

        return redirect()->back()->with('error', 'Failed to update project status');
    }
}
