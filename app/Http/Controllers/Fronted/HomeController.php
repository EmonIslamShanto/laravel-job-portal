<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    //return
    function index():View{
        $plans = Plan::where(['frontend_show'=> 1, 'show_at_home' => 1 ])->get();
        return view('front-end.home.index', compact('plans'));
    }
}
