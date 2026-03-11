<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CandidateEducation extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateEducationFactory> */
    use HasFactory;
    protected $fillable = ['degree', 'candidate_profile_id', 'institution', 'field_of_study', 'start_date', 'end_date', 'is_current'];
    public function candidateProfile(): HasOne
    {
        return $this->hasOne(CandidateProfile::class);
    }
}
