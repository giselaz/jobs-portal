<?php

namespace App\View\Components;

use App\Models\JobPortal;
use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class JobCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public JobPortal $job
    ) {
        $this->job->loadMissing([
            'employer',
            'employer.jobPortals', // optional nested
        ]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-card');
    }
}
