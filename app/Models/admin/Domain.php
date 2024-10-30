<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $table = 'domains';

    protected $fillable = [
        'project_id',
        'name',
        'description',
        'url',
        'status',
        'start_date',
        'end_date',
        'dns',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
