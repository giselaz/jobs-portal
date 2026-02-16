<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\View\Components\Breadcrumbs;

class MyJobApplicationController extends Controller
{
    public function index()
    {
        $jobApplications = request()->user()->jobApplications()
            ->with(['jobPortal' => fn($query) => $query->withCount('jobApplications')
                ->withAvg('jobApplications', 'expected_salary'), 'jobPortal.employer'])->latest()->get();
        Breadcrumbs::add('Home', '/');
        Breadcrumbs::add('My Applications', route('my-job-application.index', ['applications' => $jobApplications]));
        return view('my_job_application.index', ['applications' => $jobApplications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(JobApplication $myJobApplication)
    {
        // dd($myJobApplication);
        $myJobApplication->delete();
        return redirect()->back()->with('success', 'Job Applicaton successfully deleted');
    }
}
