<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FrontendJobPageController extends Controller
{
    function index():View
    {
        $jobs = Job::where(['status' => 'active'])->where('deadline', '>=', date('Y-m-d'))->paginate(10);
        return view('front-end.pages.jobs-list', compact('jobs'));
    }

    function show($slug):View
    {
        $job = Job::where(['slug' => $slug, 'status' => 'active'])->first();
        $openJobs = Job::where('company_id', $job->company->id)->where('status','active')->where('deadline', '>=' , date('Y-m-d'))->count();
        return view('front-end.pages.job-show', compact('job', 'openJobs'));
    }
}
