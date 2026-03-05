<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
class CandidateEducation extends Model
{
    /** @use HasFactory<\Database\Factories\CandidateEducationFactory> */
    use HasFactory;
    public function candidateProfile(): HasOne
    {
        return $this->hasOne(CandidateProfile::class);
    }
}
