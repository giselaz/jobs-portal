<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class CandidateSkill extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateSkillFactory> */
    use HasFactory;
    protected $fillable = ['candidate_profile_id', 'name', 'level', 'years_experience',''];

    public function candidateProfile(): HasOne
    {
        return $this->hasOne(CandidateProfile::class);
    }
}
