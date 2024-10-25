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

        // Mengambil anggota tim terakhir untuk menentukan nomor berikutnya
        $lastMember = TeamMember::orderBy('created_at', 'desc')->first();
        $nextId = 1;

        if ($lastMember) {
            // Ambil nomor terakhir dari id
            $lastId = $lastMember->id;
            $lastNumber = (int) substr($lastId, -6); // Ambil 6 digit terakhir
            $nextId = $lastNumber + 1; // Tambahkan 1
        }

        foreach ($request->employee_id as $employeeId) {
            // Format ID sesuai kebutuhan
            $formattedId = 'WAN2024:' . str_pad($nextId, 6, '0', STR_PAD_LEFT); // Contoh: WAN2024:000001

            // Simpan data dengan id yang terformat
            TeamMember::create([
                'id' => $formattedId, // Menyimpan ID terformat
                'team_id' => $request->team_id,
                'employee_id' => $employeeId,
            ]);

            $nextId++; // Tambahkan 1 untuk ID berikutnya
        }

        return redirect()->route('team-members.index')->with('success', 'Team members added successfully.');
    }

    public function show($id)
    {
        $teamMember = TeamMember::with(['team.project', 'employee'])->findOrFail($id);
        $teamMembers = TeamMember::where('team_id', $teamMember->team_id)->with('employee')->get();
        $teamId = $teamMember->team->id;
        $leaderName = $teamMember->team->leader->name ?? '-';

        return view('admin.team-member.show', compact('teamMember', 'teamMembers', 'teamId', 'leaderName'));
    }

    public function edit($id)
    {
        // Mengambil anggota tim dengan relasi yang diperlukan
        $teamMember = TeamMember::with(['team.project', 'employee'])->findOrFail($id);

        // Mengambil semua anggota tim berdasarkan team_id yang sama
        $teamMembers = TeamMember::where('team_id', $teamMember->team_id)
                                 ->with('employee')
                                 ->get();

        // Mengambil ID tim dan nama pemimpin
        $teamId = $teamMember->team->id;
        $leaderName = $teamMember->team->leader->name ?? '-';

        $employees = Employee::all();

        // Mengirim data tim, anggota, dan pemimpin ke view
        return view('admin.team-member.edit', compact('employees', 'teamMember', 'teamMembers', 'teamId', 'leaderName'));
    }


    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan 'employee_id' adalah array dan berisi ID yang valid
        $request->validate([
            'employee_id' => 'required|array', // Pastikan ini adalah array
            'employee_id.*' => 'exists:employees,id', // Setiap ID dalam array harus ada di tabel employees
        ]);

        // Temukan tim anggota berdasarkan ID
        $teamMember = TeamMember::findOrFail($id);

        // Hapus anggota tim yang ada
        TeamMember::where('team_id', $teamMember->team_id)->delete();

        // Tambahkan anggota tim yang baru
        foreach ($request->employee_id as $employeeId) {
            TeamMember::create([
                'team_id' => $teamMember->team_id, // Menggunakan team_id dari anggota tim yang ditemukan
                'employee_id' => $employeeId,
            ]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->route('team-members.index')->with('success', 'Team members updated successfully.');
    }




    public function destroy($team_id)
    {
        // Hapus semua anggota tim yang terkait dengan team_id
        TeamMember::where('team_id', $team_id)->delete();

        return redirect()->route('team-members.index')->with('success', 'All team members removed successfully.');
    }
}
