<?php

namespace App\Http\Controllers;

set_time_limit(300); // 5 minutes
use App\Http\Controllers\Controller;
use App\Http\Requests\JobCandidateRequest;
use App\Jobs\ParseResumeJob;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use  Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function show(CandidateProfile $candidate)
    {
        $user = request()->user()->loadCount('jobApplications');
        $profile = $user->candidateProfile;
        $applicationCount = $user->job_applications_count;
        $recentApplications = $user->jobApplications()
            ->with('jobPortal')
            ->latest()
            ->limit(5)
            ->get();

        return view("candidate.profile.show", compact('profile', 'recentApplications', 'applicationCount'));
    }

    public function edit(string $id)
    {
        $profile = Auth::user()->candidateProfile;
        return view("candidate.profile.edit", compact('profile'));
    }

    public function update(JobCandidateRequest $request)
    {

        $user = $request->user();
        // Update or create candidate profile
        $profileData = [
            'phone' => $request->phone,
            'location' => $request->location,
            'job_title' => $request->job_title,
            'years_of_experience' => $request->years_of_experience,
            'expected_salary' => $request->expected_salary,
            'salary_currency' => $request->salary_currency ?? 'USD',
            'bio' => $request->bio,
            'is_profile_complete' => true,
        ];

        $user->candidateProfile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function uploadCv()
    {

        $user = request()->user()->loadCount('jobApplications');
        $profile = $user->candidateProfile;
        $processing = false;
        $profile->load(['experiences', 'educations', 'languages', 'skills']);
        return view('candidate.profile.upload-cv', compact('profile', 'processing'));
    }
    public function storeCv(Request $request)
    {
        $request->validate([
            'cv_path' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $profile = request()->user()->candidateProfile;
        $path = $request->file('cv_path')->store('cvs', 'private');
        $profile->update([
            'cv_path' => $path
        ]);

        ParseResumeJob::dispatch(storage_path('app/private/' . $path), $profile);

        return back()->with('success', 'CV uploaded and profile auto-filled!');
    }
    /**
     * Download the candidate's CV.
     */
    public function downloadCv()
    {
        $profile = Auth::user()->candidateProfile;

        if (!$profile || !$profile->cv_path) {
            return abort(404, 'CV not found');
        }

        if (!Storage::disk('public')->exists($profile->cv_path)) {
            return abort(404, 'CV file not found');
        }

        return response()->download(storage_path('app/public/' . $profile->cv_path));
    }
}
