<?php

namespace App\Models\admin;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

   protected $table = 'team_member';

   public $timestamps = false;

   protected $fillable = [
       'team_id',
       'employee_id',
   ];

   public function team()
   {
       return $this->belongsTo(Team::class);
   }

   public function employee()
   {
       return $this->belongsTo(Employee::class);
   }

   public function project()
   {
    return $this->belongsTo(Project::class);
   }
}

