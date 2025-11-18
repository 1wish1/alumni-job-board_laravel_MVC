<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'company_name',
        'location',
        'job_type',
        'posted_by'
    ];

    // Relationships

    // The admin who posted the job
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Applications for this job
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
