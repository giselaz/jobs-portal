<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\JobPortal;
use App\View\Components\Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MyJobController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAnyEmployer', JobPortal::class);
        Breadcrumbs::add('Home', route('jobs.index'));
        Breadcrumbs::add('My Jobs', route('my-jobs.index'));
        $myJobs = request()->user()->employer->jobPortals()->with(['employer', 'jobApplications', 'JobApplications.user']);
        return view('my-jobs.index', ['jobs' => $myJobs->get()]);
    }

    public function create()
    {
        Gate::authorize('create', JobPortal::class);
        Breadcrumbs::add('Home', route('jobs.index'));
        Breadcrumbs::add('My Jobs', route('my-jobs.index'));
        Breadcrumbs::add('New Job', route('my-jobs.create'));
        return view('my-jobs.create');
    }

    public function store(JobRequest $request, JobPortal $job)
    {

        $request->user()->employer->jobPortals()->create($request->validated());

        return redirect()->route('my-jobs.index')->with('success', "Job was successfully created.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPortal $myJob)
    {
        Breadcrumbs::add('Home', route('jobs.index'));
        Breadcrumbs::add('My Jobs', route('my-jobs.index'));
        Breadcrumbs::add("Edit " . $myJob->title, route('my-jobs.edit', ['my_job' => $myJob]));
        return view("my-jobs.edit", ['job' => $myJob]);
    }


    public function update(JobRequest $request, JobPortal $myJob)
    {
        $myJob->update($request->validated());
        return redirect()->route("my-jobs.index")->with('success', 'Job updated successfully!');
    }

    public function destroy(JobPortal $myJob)
    {
        $myJob->delete();

        return  redirect()->route('my-jobs.index')->with('success', "Job was was deleted");
    }
}
