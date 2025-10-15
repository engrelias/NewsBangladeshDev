<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'role_title',
        'role_status',
        'role_order',
        'role_permissions',
        'role_created_by',
        'role_updated_by',
    ];

    public function users(){
        return $this->hasMany(User::class, 'user_role', 'id');
    }

}
