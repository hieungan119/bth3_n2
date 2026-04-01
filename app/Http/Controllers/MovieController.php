<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function topMovies()
    {
        $movies = DB::table('movie')
            ->select('movie_name', 'release_date', 'vote_average')
            ->orderBy('vote_average', 'desc')
            ->limit(10)
            ->get();

        return view('top_movies', compact('movies'));
    }

    public function longMovies()
    {
        $movies = DB::table('movie')
            ->select('movie_name', 'release_date', 'runtime')
            ->where('runtime', '>', 120)
            ->limit(10)
            ->get();

        return view('long_movies', compact('movies'));
    }

    public function phimCanada()
    {
        $phim = DB::table('movie')
            ->where('country_name', 'Canada')
            ->select('movie_name', 'release_date', 'runtime')
            ->get();

        return view('phim-canada', compact('phim'));
    }
}