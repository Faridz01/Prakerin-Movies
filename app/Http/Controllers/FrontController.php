<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\movie;
use App\Models\genre_film;

class FrontController extends Controller
{
    public function index() {
        $movies = movie::orderBy('id', 'desc')->take(3)->get();
        // dd($movies);
        $allMovies = movie::orderBy('id', 'desc')->get();
        $genres = genre_film::all();
        return view('index', compact('movies', 'genres', 'allMovies'));
    }
    public function movies()
    {
        $genres = genre_film::all();
        $movies = movie::orderBy('id', 'desc')->get();
        return view('movies', compact('movies', 'genres'));
    }

    public function singleMovie($id)
    {
        $movie = movie::findOrFail($id);
        return view('singleMovie', compact('movie'));
    }
}
