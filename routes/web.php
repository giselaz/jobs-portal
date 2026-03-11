<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\MyJobController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CandidateController;

Route::get('/', [HomeController::class, 'index'])->name('home');
// loginController
Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
//Register Controller
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
// JobsController
Route::resource('jobs', JobController::class)->only(['index', 'show']);
// Employer
Route::get('employer', [EmployerController::class, 'index'])->name('employer.index');
Route::get('employer/{employer}', [EmployerController::class, 'show'])->name('employer.show');

Route::middleware('auth')->group(function () {
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);
    Route::resource('my-job-application', MyJobApplicationController::class)->only(['index', 'destroy']);
    Route::get('cv/{application}', [MyJobApplicationController::class, 'viewCv'])->name('cv.view');
    Route::resource('employer', EmployerController::class)->only(['create', 'store']);
    Route::middleware('employer')->resource('my-jobs', MyJobController::class)->only(['store', 'create', 'edit', 'update', 'destroy']);
    Route::get('candidate/profile/', [CandidateController::class, 'show'])->name('profile.show');
    Route::middleware('candidate')->group(function () {
        Route::resource('candidate/profile', CandidateController::class)->only(['edit', 'update']);
        Route::get('candidate/profile/download-cv', [CandidateController::class, 'downloadCv'])->name('candidate.cv.download');
        Route::get('candidate/profile/upload-cv', [CandidateController::class, 'uploadCv'])->name('candidate.cv.uploadCv');
        Route::post('candidate/profile/store-cv', [CandidateController::class, 'storeCv'])->name('candidate.cv.upload');
    });
});
