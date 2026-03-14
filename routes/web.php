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
Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/', [AuthController::class, 'create'])->name('create');
    Route::post('/', [AuthController::class, 'store'])->name('store');
    Route::delete('/', [AuthController::class, 'destroy'])->name('destroy');
});
Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::get('register', [RegisterController::class, 'create'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
// JobsController
Route::resource('jobs', JobController::class)->only(['index', 'show']);

Route::prefix('candidate')->name('candidate.')->middleware(['auth', 'candidate'])->group(function () {
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);
    Route::resource('my-job-application', MyJobApplicationController::class)->only(['index', 'destroy']);
    Route::get('cv/{application}', [MyJobApplicationController::class, 'viewCv'])->name('cv.view');
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [CandidateController::class, 'show'])->name('show');
        Route::get('edit', [CandidateController::class, 'edit'])->name('edit');
        Route::patch('edit', [CandidateController::class, 'update'])->name('update');
        Route::get('download-cv', [CandidateController::class, 'downloadCv'])->name('cv.download');
        Route::get('upload-cv', [CandidateController::class, 'uploadCv'])->name('cv.uploadCv');
        Route::post('store-cv', [CandidateController::class, 'storeCv'])->name('cv.upload');
    });
});

Route::prefix('employer')->name('employer.')->middleware(['auth'])->group(function () {
    Route::get('/', [EmployerController::class, 'index'])->name('index');
    Route::get('/{employer}', [EmployerController::class, 'show'])->name('show');
    Route::get('create', [EmployerController::class, 'create'])->name('create');
    Route::post('/', [EmployerController::class, 'store'])->name('store');
    Route::middleware('employer')->group(function () {
        Route::resource('my-jobs', MyJobController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    });
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    // Future admin routes
});
