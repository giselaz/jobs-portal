<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobPortal;

class HomeController extends Controller
{
    public function index()
    {

        return view('pages.home', ['popularJobs' => JobPortal::popularApplications()->limit(5)->get()]);
    }
}
