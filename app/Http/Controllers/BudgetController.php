<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    function topbudget()
    {
        $phim = DB::select("select movie_name, release_date, budget
                            from movie
                            order by budget desc
                            limit 10");
        return view('topbudget', compact('phim'));
    }
}