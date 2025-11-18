<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Application;

class AdminJobController extends Controller
{
    // Show all applications for a specific job
    public function applications(Job $job)
    {
        $applications = Application::where('job_id', $job->id)
            ->with('user') // load user info
            ->get();

        return view('admin.jobs.applications', compact('job', 'applications'));
    }

    // Update status and message for an application
    public function updateApplication(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected',
            'message' => 'required|string|max:500',
        ]);

        $application->update([
            'status' => $request->status,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Application updated successfully.');
    }
}
