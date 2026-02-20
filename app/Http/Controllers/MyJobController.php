<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobPortal;
use App\View\Components\Breadcrumbs;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function index()
    {
        Breadcrumbs::add('Home', route('jobs.index'));
        Breadcrumbs::add('My Jobs', route('my-jobs.index'));
        return view('my-jobs.index');
    }

    public function create()
    {
        Breadcrumbs::add('Home', route('jobs.index'));
        Breadcrumbs::add('My Jobs', route('my-jobs.index'));
        Breadcrumbs::add('New Job', route('my-jobs.create'));
        return view('my-jobs.create');
    }

    public function store(Request $request, JobPortal $job)
    {

        // return view('my-jobs.create');
    }
}
