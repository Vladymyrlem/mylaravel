<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index',compact('companies'));
    }
    public function show($slug)
    {
        return view('companies.show',['slug' => $slug] );
    }

}
