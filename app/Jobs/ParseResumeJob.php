<?php

namespace App\Jobs;

use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\CandidateProfile;
use App\Services\CvParserService;

class ParseResumeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;
    protected CandidateProfile $candidate;

    public function __construct($path, CandidateProfile $candidate)
    {
        $this->path = $path;
        $this->candidate = $candidate;
    }

    /**
     * Execute the job.
     */
    public function handle(CvParserService $parser): void
    {
        $parser->parseAndFillProfile($this->path, $this->candidate);
    }
}
