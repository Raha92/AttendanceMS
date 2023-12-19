<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

   // in the User model

protected $fillable = [
    'name', 'email', 'password', 'role', 'teacher_email', 'teacher_password',
];


    protected $hidden = [
        'pin_code', 'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            return !empty(array_intersect($roles, $this->roles->pluck('slug')->toArray()));
        } else {
            return $this->roles->pluck('slug')->contains($roles);
        }
    }

    public function hasRole($role)
    {
        return $this->roles->pluck('slug')->contains($role);
    }
}
