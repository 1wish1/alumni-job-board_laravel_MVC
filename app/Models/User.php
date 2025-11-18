<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'course',
        'graduation_year',
        'bio',
    ];
    

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships

    // Jobs posted by the user (admin)
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // Applications submitted by the user (alumni)
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
