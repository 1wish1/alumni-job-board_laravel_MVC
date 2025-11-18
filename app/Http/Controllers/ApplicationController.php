<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::where('user_id', Auth::id())->get();
        return view('applications.index', compact('applications'));
    }

    public function create(Job $job)
    {
        return view('applications.create', compact('job'));
    }

    public function store(Request $request, Job $job)
    {
        $user = auth()->user();

        // Check if profile is complete
        $requiredFields = ['name', 'email', 'phone', 'address', 'course', 'graduation_year', 'bio'];

        foreach ($requiredFields as $field) {
            if (empty($user->$field)) {
                return redirect()->route('profile.edit')
                    ->with('error', 'You must complete your profile before applying for a job.');
            }
        }

        // Validate application form
        $request->validate([
            'resume_link' => 'required|url|max:255'
        ]);

        // Create application
        $user->applications()->create([
            'job_id' => $job->id,
            'resume_link' => $request->resume_link,

        ]);

        return redirect()->route('jobs.index')->with('success', 'Application submitted successfully!');
    }
}
