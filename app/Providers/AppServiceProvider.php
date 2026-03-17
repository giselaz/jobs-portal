<?php

namespace App\Providers;

use App\Models\JobPortal;
use App\Policies\JobPolicy;
use App\View\Composers\GlobalComposer;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\NavbarComposer;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(JobPortal::class, JobPolicy::class);
        View::composer('components.ui.navbar', NavbarComposer::class);
        View::composer('*', GlobalComposer::class);
    }
}
