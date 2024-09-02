<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Permission extends Model
{
    use HasFactory, HasRoles;


    protected $guarded=[];

    // public $guard_name = 'api';

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
