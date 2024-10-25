<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ProjectNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectNotificationController extends Controller
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

        return view('employee.inbox', compact('notifications'));
    }

    public function show($id)
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::guard('employees')->id();

        // Ambil notifikasi berdasarkan ID
        $notification = ProjectNotification::where(function ($query) use ($userId) {
            $query->where('team_member_id', $userId)
                  ->orWhere('leader_id', $userId);
        })
        ->with('leader') // Memuat relasi leader untuk mengurangi query
        ->findOrFail($id); // Mengambil notifikasi, jika tidak ada, akan menghasilkan 404

        // Tandai notifikasi sebagai dibaca jika belum
        if (!$notification->is_read) {
            $notification->is_read = true;
            $notification->save();
        }

        return view('employee.inbox', compact('notification'));
    }



    public function destroy($id)
    {
        // Cari notifikasi berdasarkan ID
        $notification = ProjectNotification::findOrFail($id);

        // Pastikan notifikasi milik team member yang sedang login
        if ($notification->team_member_id !== Auth::user()->team_member_id) {
            abort(403, 'Unauthorized action.');
        }

        // Hapus notifikasi
        $notification->delete();

        return redirect()->back()->with('success', 'Notifikasi berhasil dihapus.');
    }
}
