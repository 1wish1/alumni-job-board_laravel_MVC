<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'job_id',
        'user_id',
        'applicant_name',
        'email',
        'resume_link',
        'message',
        'status'
    ];

    // Relationships

    // The user who applied
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // The job this application belongs to
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
