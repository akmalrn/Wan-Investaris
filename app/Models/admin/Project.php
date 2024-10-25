<?php

namespace App\Models\admin;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    use HasFactory;

    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'client_id',
        'name',
        'start_date',
        'end_date',
        'status',
        'budget',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
