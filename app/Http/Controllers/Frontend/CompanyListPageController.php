<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyListPageController extends Controller
{
    function index() : View{

        $companies = Company::where(['profile_completion' => 1, 'visibility' => 1])->get();
        return view('front-end.pages.company-index', compact('companies'));
    }

    function show(string $slug) : View{
        $company = Company::where(['slug' => $slug, 'profile_completion' => 1, 'visibility' => 1])->first();
        return view('front-end.pages.company-details', compact('company'));
    }
}
