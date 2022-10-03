<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;

class FrontController extends Controller
{
    public function index() {
        // $movies = Movie::orderBy('id', 'desc')->get();
        return view('index');
    }
    public function movies()
    {
        $movies = Movie::orderBy('id', 'desc')->get();
        return view('movies', compact('movies'));
    }
}
