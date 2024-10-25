<?php

namespace App\Models\admin;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectNotification extends Model
{
    use HasFactory;

    protected $table = 'project_notifications';

    protected $fillable = [
        'team_member_id',
        'message',
        'is_read',
        'type',
        'created_by'
    ];

    public function teamMember()
    {
        return $this->belongsTo(TeamMember::class);
    }

    // Akses ke Project melalui TeamMember
    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Method untuk mendapatkan project dari team member
     */
    public function project()
    {
        return $this->teamMember->team->project ?? null;
    }

    /**
     * Method untuk menandai notifikasi sebagai sudah dibaca
     */
    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }
    // ProjectNotification.php
    public function leader()
    {
        return $this->belongsTo(Employee::class, 'leader_id');
    }
}
