<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    public function listGenres()
    {
        $genres = DB::table('genre')
                    ->select('genre_name', 'genre_name_vn')
                    ->get();
        return view('genres', compact('genres'));
    }
}
