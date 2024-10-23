<?php

namespace App\Models;

use App\Models\admin\Team;
use App\Models\admin\TeamMember;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Employee extends Model implements AuthenticatableContract
{

    use Authenticatable;

    use HasFactory;

     protected $table = 'employees';

     protected $fillable = [
        'name', 'position', 'email', 'password', 'phone_number', 'hire_date', 'salary', 'status', 'role'
    ];

    public function teamMembers()
    {
        return $this->hasMany(TeamMember::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
