<?php

namespace App\Http\Controllers;

use App\Models\casting;
use App\Models\genre_film;
use App\Models\movie;
use App\Models\tahun_rilis;
use Illuminate\Http\Request;
use Alert;
use Validator;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = movie::orderBy('id', 'desc')->get();
        return view('admin.movie.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = genre_film::all();
        $tahun_rilis = tahun_rilis::all();
        $casting = casting::all();
        return view('admin.movie.create', compact('casting', 'genre', 'tahun_rilis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'judul_film' => 'required|unique:movies',
            'sinopsis' => 'required',
            'background' => 'required|image|max:4068',
            'cover' => 'required|image|max:4068',
            'durasi' => 'required',
            'id_genre' => 'required',
            'id_tahun_rilis' => 'required',
            'casting' => 'required',
        ];

        $messages = [
            'judul_film.required' => 'Judul harus di isi!',
            'judul_film.unique' => 'Judul tidak boleh sama!',
            'sinopsis.required' => 'sinopsis harus di isi!',
            'background.required' => 'background harus di isi!',
            'background.image' => 'background harus berjenis jpg & png!',
            'background.max' => 'background harus dibawah kapasitas 4068kb!',
            'cover.required' => 'cover harus di isi!',
            'cover.image' => 'cover harus berjenis jpg & png!',
            'cover.max' => 'cover harus dibawah kapasitas 4068kb!',
            'durasi.required' => 'Durasi harus di isi!',
            'id_genre.required' => 'Genre harus di isi!',
            'id_tahun_rilis.required' => 'Tahun Rilis harus di isi!',
            'casting.required' => 'Casting harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('data yang anda input ada kesalahan', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $movies = new movie();
        $movies->judul_film = $request->judul_film;
        $movies->durasi = $request->durasi;
        $movies->sinopsis = $request->sinopsis;
        $movies->id_genre = $request->id_genre;
        $movies->id_tahun_rilis = $request->id_tahun_rilis;
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->cover = $name;
        }
        if ($request->hasFile('background')) {
            $image = $request->file('background');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->background = $name;
        }
        $movies->save();
        $movies->casting()->attach($request->casting);
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = movie::findOrFail($id);
        return view('admin.movie.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = movie::findOrFail($id);
        $genre = genre_film::all();
        $tahun_rilis = tahun_rilis::all();
        $casting = casting::all();
        $selectCast = casting::with('movie')->pluck('id')->toArray();
        // dd($selectCast);
        return view('admin.movie.edit', compact('selectCast', 'movie', 'casting', 'genre', 'tahun_rilis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'judul_film' => 'required',
            'background' => 'image|max:1024',
            'cover' => 'image|max:1024',
            'sinopsis' => 'required',
            'id_genre' => 'required',
            'id_tahun_rilis' => 'required',
            'casting' => 'required',
        ];

        $messages = [
            'judul_film.required' => 'Nama harus di isi!',
            'cover.image' => 'cover harus berjenis jpg & png!',
            'cover.max' => 'cover harus dibawah kapasitas 1024kb!',
            'background.image' => 'background harus berjenis jpg & png!',
            'background.max' => 'background harus dibawah kapasitas 1024kb!',
            'sinopsis.required' => 'sinopsis harus di isi!',
            'id_genre.required' => 'Genre harus di isi!',
            'id_tahun_rilis.required' => 'Tahun Rilis harus di isi!',
            'casting.required' => 'Casting harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('data yang anda input ada kesalahan', 'Oops!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $movies = Movie::findOrFail($id);
        $movies->judul_film = $request->judul_film;
        $movies->sinopsis = $request->sinopsis;
        $movies->id_genre = $request->id_genre;
        $movies->durasi = $request->durasi;
        $movies->id_tahun_rilis = $request->id_tahun_rilis;
        if ($request->hasFile('cover')) {
            $movies->deleteImage();
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->cover = $name;
        }
        if ($request->hasFile('background')) {
            $movies->deleteBackground();
            $image = $request->file('background');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/movies/', $name);
            $movies->background = $name;
        }
        $movies->save();
        $movies->casting()->sync($request->casting);
        Alert::success('Done', 'Data berhasil diedit')->autoClose(2000);
        return redirect()->route('movie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movies = movie::findOrFail($id);
        $movies->deleteImage();
        $movies->deleteBackground();
        $movies->delete();
        $movies->casting()->detach();

        Alert::success('Done', 'Data berhasil dihapus')->autoClose(2000);
        return redirect()->route('movie.index');
    }
}
