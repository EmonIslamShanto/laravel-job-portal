<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CandidateListPageController extends Controller
{
    function index() : View{

        $candidates = Candidate::where(['profile_completed' => 1, 'visibility' => 1])->get();
        return view('front-end.pages.candidate-index', compact('candidates'));
    }

    function show(string $slug) : View{
        $candidate = Candidate::where(['slug' => $slug, 'profile_completed' => 1, 'visibility' => 1])->first();
        return view('front-end.pages.candidate-details', compact('candidate'));
    }
}
