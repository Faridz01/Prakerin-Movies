<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Alert;

use App\Models\movie;
use App\Models\genre_film;
use App\Models\reviewers;

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
        $review = reviewers::select('reviewers.nama','reviewers.email','reviewers.komentar')
                    ->join('movies','movies.id','=','reviewers.id_movie')
                    ->where('reviewers.id_movie',$id)
                    ->get();
        return view('singleMovie', compact('movie', 'review'));
    }

    public function sendReview(Request $request)
    {
        $review = new reviewers();
        $review->nama = $request->nama;
        $review->email = $request->email;
        $review->komentar = $request->komentar;
        $review->id_movie = $request->id_movie;
        $review->save();
        Alert::success('Terima Kasih', 'Tanggapan anda sudah kami terima')->autoClose(3000);
        return redirect()->back();
    }
}
