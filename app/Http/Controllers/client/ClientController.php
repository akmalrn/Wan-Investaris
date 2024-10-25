<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\TeamMember;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {

        return view('client.index');
    }

    public function project(Request $request)
    {
        // Ambil project_id dari request jika ada
        $projectId = $request->input('project_id');

        // Ambil semua TeamMembers yang berhubungan dengan tim, proyek, dan client
        $teamMembers = TeamMember::with(['team.leader', 'team.members.employee', 'team.project.client']);

        // Jika project_id ada, tambahkan filter berdasarkan project_id
        if ($projectId) {
            $teamMembers->whereHas('team.project', function ($query) use ($projectId) {
                $query->where('id', $projectId); // Sesuaikan dengan nama kolom ID proyek di tabel projects
            });
        }

        // Ambil hasil akhir
        $teamMembers = $teamMembers->get();

        return view('client.index', compact('teamMembers'));
    }




}
