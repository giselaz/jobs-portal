<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use App\View\Components\Breadcrumbs;
use Illuminate\Support\Facades\Storage;

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
    public function viewCv(JobApplication $application)
    {
        if ($application->user_id != request()->user()->id) {
            return abort(403);
        }
        $path = $application->cv_path;
        if ($path == null  || !Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return response()->file(
            Storage::disk('private')->path($path)
        );
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();
        return redirect()->back()->with('success', 'Job Applicaton successfully deleted');
    }
}
