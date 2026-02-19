<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class EmployerController extends Controller
{
    use AuthorizesRequests;
    public function __construct()
    {
        $this->authorizeResource(Employer::class,'employer');
    }
    public function create()
    {

        return view("employer.create");
    }
    public function store(Request $request)
    {
        request()->user()->employer()->create([
            'company_name' => 'required|min:3|unique:employers,company_name'
        ]);
        return redirect()->route('jobs.index')->with('success', 'Your employer account was created');
    }
}
