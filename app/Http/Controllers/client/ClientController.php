<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\admin\TeamMember;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function project()
    {
        // Ambil client yang sedang login
        $client = auth()->user();

        // Ambil semua TeamMembers yang berhubungan dengan tim, proyek, dan client yang sedang login
        $teamMembers = TeamMember::with(['team.leader', 'team.members.employee', 'team.project.client'])
            ->whereHas('team.project.client', function ($query) use ($client) {
                $query->where('id', $client->id); // Cocokkan client yang sedang login
            })->get();

        return view('client.project', compact('teamMembers'));
    }

}
