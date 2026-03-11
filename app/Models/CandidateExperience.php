<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateExperience extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateExperienceFactory> */
    use HasFactory;
    protected $fillable = [
        'candidate_profile_id',
        'job_title',
        'company_name',
        'location',
        'employment_type', 
        'start_date',
        'end_date',
        'description',
        'is_current'
    ];

    public function candidateProfile(): BelongsTo
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}
