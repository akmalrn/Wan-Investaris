<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class Client extends Model implements AuthenticatableContract
{

    use Authenticatable;

    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'address', 'contact_person', 'project_count', 'role'
    ];

}
