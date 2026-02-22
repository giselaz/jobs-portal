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
    public function viewEmployer(User $user,JobPortal $job): bool
    {
        if($user->employer_id !== $job->employer_id)
        {
            return false;
        }
        
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
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, JobPortal $jobPortal): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, JobPortal $jobPortal): bool
    {
        return false;
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
