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
        return view('jobs.index', ['jobs' => JobPortal::with('employer')->latest()->filter($filters)->paginate(10)]);
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
}
