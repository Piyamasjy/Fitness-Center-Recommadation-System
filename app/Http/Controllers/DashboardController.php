<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fitness;

use App\Typesport;

use App\Http\Controllers\Input;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function Welcome()
    {
    	return view('welcome');
    }

}
