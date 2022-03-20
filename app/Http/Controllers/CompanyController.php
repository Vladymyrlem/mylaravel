<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('company.index',compact('company'));
    }
    public function show($slug)
    {
        return view('company.show',['slug' => $slug] );
    }

}
