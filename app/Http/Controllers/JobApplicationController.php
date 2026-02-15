<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPortal;
use Illuminate\Http\Request;
use App\View\Components\Breadcrumbs;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(JobPortal $job)
    {

        Breadcrumbs::add('Home', '/');
        Breadcrumbs::add('Jobs', route('jobs.index'));
        Breadcrumbs::add($job->title, route('jobs.show', ['job' =>  $job]));
        Breadcrumbs::add('Apply', route('job.application.create', ['job' => $job]));
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JobPortal $job)
    {
        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            ...$request->validate([
                'expected_salary' => 'required|min:1|max:1000000'
            ])
        ]);
        return redirect()->route('jobs.show', ['job' => $job])->with('success', 'Job application submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
