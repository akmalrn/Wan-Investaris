<?php

namespace App\Models\admin;

use App\Models\admin\ProjectNotification;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TeamMember extends Model
{
    use HasFactory;

    protected $table = 'team_member';

    // Kolom-kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'team_id',      // ID dari tim
        'employee_id',  // ID dari employee
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        // Tambahkan event listener untuk 'created'
        static::created(function ($teamMember) {
            // Panggil fungsi untuk membuat notifikasi otomatis
            $teamMember->createNotification();
        });
    }

    public function createNotification()
    {
        // Mulai transaksi basis data
        DB::transaction(function () {
            // Validasi team_member_id
            $validTeamMember = TeamMember::find($this->id);
            if (!$validTeamMember) {
                throw new \Exception("ID team member tidak valid: " . $this->id);
            }

            // Logika pembuatan notifikasi untuk anggota tim
            $notification = new ProjectNotification();
            $notification->team_member_id = $this->id; // ID anggota tim baru
            $notification->message = "New Project: " . $this->employee->name;
            $notification->type = 'new_project'; // Tipe notifikasi
            $notification->created_by = auth()->user()->id; // ID pengguna yang membuat notifikasi
            $notification->leader_id = $this->team->leader_id; // Isi leader_id dari tim

            // Simpan notifikasi untuk anggota tim
            if (!$notification->save()) {
                throw new \Exception("Gagal membuat notifikasi untuk anggota tim.");
            }

            // Mendapatkan leader dari tim
            $leader = $this->team->leader; // Ambil pemimpin tim

            // Logika pembuatan notifikasi untuk leader tim
            if ($leader) {
                $leaderTeamMember = TeamMember::where('team_id', $this->team_id)
                    ->where('employee_id', $leader->id) // Pastikan menggunakan employee_id
                    ->first();

                if ($leaderTeamMember) {
                    $leaderNotification = new ProjectNotification();
                    $leaderNotification->team_member_id = $leaderTeamMember->id; // ID anggota tim dari leader
                    $leaderNotification->message = "New Project: " . $this->employee->name . " has been assigned.";
                    $leaderNotification->type = 'new_project_leader'; // Tipe notifikasi untuk leader
                    $leaderNotification->created_by = auth()->user()->id; // ID pengguna yang membuat notifikasi
                    $leaderNotification->leader_id = $leader->id; // Isi leader_id dari pemimpin tim

                    // Simpan notifikasi untuk leader
                    if (!$leaderNotification->save()) {
                        throw new \Exception("Gagal membuat notifikasi untuk leader tim.");
                    }
                }
            }
        });
    }
    // Relasi ke model Team
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    // Relasi ke model Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relasi ke model Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function leader()
    {
        return $this->team->leader(); // Assumes 'leader' is a relationship in the Team model
    }
}
