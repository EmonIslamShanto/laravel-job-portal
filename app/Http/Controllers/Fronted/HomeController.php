<?php

namespace App\Http\Controllers\Fronted;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\IndexHint;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    //return
    function index():View{
        return view('front-end.home.index');
    }
}
