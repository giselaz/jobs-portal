<?php

namespace App\Policies;

use App\Models\JobApplication;
use Illuminate\Auth\Access\Response;
use App\Models\JobPortal;
use App\Models\User;

class JobPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }
    public function viewAnyEmployer(User $user): bool
    {

        return true;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, ?JobPortal $jobPortal): bool
    {
        return true;
    }
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->employer !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobPortal $jobPortal): bool | Response
    {
        if ($jobPortal->employer->user_id !== $user->id) {
            return false;
        }
        if ($jobPortal->jobApplications()->count() > 0) {
            return Response::deny('Can not change job with applications');
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model. 
     */
    public function delete(User $user, JobPortal $jobPortal): bool
    {
        if ($jobPortal->employer->user_id !== $user->id) {
            return false;
        }
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, JobPortal $jobPortal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, JobPortal $jobPortal): bool
    {
        return false;
    }

    public function apply(User $user, JobPortal $jobPortal): bool
    {
        return !$jobPortal->hasUserApplied($user);
    }
}
