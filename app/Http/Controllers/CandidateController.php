<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobCandidateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $profile = Auth::user()->candidateProfile;
        return view("candidate.profile.show", compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Auth::user()->candidateProfile;
        return view("candidate.profile.edit", compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
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

        // Handle CV upload
        // if ($request->hasFile('cv_path')) {
        //     // Delete old CV if exists
        //     if ($user->candidateProfile && $user->candidateProfile->cv_path) {
        //         Storage::delete($user->candidateProfile->cv_path);
        //     }
        //     $path = $request->file('cv_path')->store('cvs', 'public');
        //     $profileData['cv_path'] = $path;
        // }

        $user->candidateProfile()->updateOrCreate(
            ['user_id' => $user->id],
            $profileData
        );

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
