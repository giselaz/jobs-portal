<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPortal;
use Illuminate\Http\Request;
use App\View\Components\UI\Breadcrumbs;
use Illuminate\Support\Facades\Gate;

class JobApplicationController extends Controller
{
    public function create(JobPortal $job)
    {
        Gate::authorize('apply', $job);
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JobPortal $job)
    {
        $validatedData =
            $request->validate(
                [
                    'expected_salary' => 'required|min:1|max:1000000',
                    "cv" => 'required|file|mimes:pdf|max:2048'
                ]
            );
        $file = $validatedData['cv'];
        $path = $file->store('cvs', 'private');
        $job->jobApplications()->create(
            [
                'user_id' => $request->user()->id,
                'expected_salary' => $validatedData['expected_salary'],
                'cv_path' => $path
            ]
        );
        return redirect()->route('jobs.show', ['job' => $job])->with('success', 'Job application submitted');
    }


}
