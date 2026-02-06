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
        $jobs = JobPortal::query();
        $jobs->when(request('search'), function ($query) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        });
        // $jobs->when(request('salary_min'), function ($query) {
        //     $query->where('title', 'like', '%' . request('title') . '%')
        //         ->orWhere('description', 'like', '%' . request('title') . '%');
        // });
        return view('jobs.index', ['jobs' => $jobs->get()]);
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
        Breadcrumbs::add($job->title, route('jobs.show', compact('job')));
        return view('jobs.show', compact('job'));
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
