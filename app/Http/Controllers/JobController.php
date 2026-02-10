<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPortal;
use App\View\Components\Breadcrumbs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Breadcrumbs::add('Home', '/');
        Breadcrumbs::add('Jobs', route('jobs.index'));
        $filters = request()->only('search', 'min_salary', 'max_salary', 'experience', 'category');
        return view('jobs.index', ['jobs' => JobPortal::with('employer')->filter($filters)->get()]);
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
    public function show(JobPortal $job)
    {
        Breadcrumbs::add('Home', '/');
        Breadcrumbs::add('Jobs', route('jobs.index'));
        $jobModel = $job->load(['employer.jobPortals' => function ($query) use ($job) {
            $query->where('id', '!=', $job->id);
        }]);
        Breadcrumbs::add($job->title, route('jobs.show', ['job' =>  $jobModel]));
        return view('jobs.show', ['job' =>  $jobModel]);
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
