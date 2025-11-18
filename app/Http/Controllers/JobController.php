<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required',
            'company_name' => 'required|string|max:150',
            'location' => 'required|string|max:100',
            'job_type' => 'required|string|max:100',
        ]);

        Job::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'company_name' => $request->company_name,
            'location' => $request->location,
            'job_type' => $request->job_type,
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')
                        ->with('success', 'Job deleted successfully.');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'required',
            'company_name' => 'required|string|max:150',
            'location' => 'required|string|max:100',  
            'job_type' => 'required|string|max:100',  
        ]);
        $job->update($validated);

        return redirect()->route('jobs.index')
                        ->with('success', 'Job updated successfully');
    }

}
