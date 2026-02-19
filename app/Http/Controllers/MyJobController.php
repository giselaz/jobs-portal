<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyJobController extends Controller
{
    public function index()
    {
        return view('my-job.index');
    }
}
