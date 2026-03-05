<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CandidateProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'location',
        'job_title',
        'bio',
        'expected_salary',
        'salary_currency',
        'years_of_experience',
        'cv_path',
        'is_profile_complete',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function experiences(): HasMany
    {
        return $this->hasMany(CandidateExperience::class);
    }
    public function educations(): HasMany
    {
        return $this->hasMany(CandidateEducation::class);
    }
    public function languages(): HasMany
    {
        return $this->hasMany(CandidateLanguage::class);
    }

    public function skills(): HasMany
    {
        return $this->hasMany(CandidateSkill::class);
    }
}
