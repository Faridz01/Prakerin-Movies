<?php

namespace App\Http\Controllers;

use App\Models\genre_film;
use Illuminate\Http\Request;
use Alert;
use Validator;

class GenreFilmController extends Controller
{

    public function index()
    {
        $genres = genre_film::orderBy('id', 'desc') ->get();
        return view ('admin.genre.index', compact('genres'));
    }

    public function create()
    {
        // return view ('admin.genre.create');
    }

    public function store(Request $request)
    {
        // validasi
        // $validated = $request->validate([
        //     'kategori' => 'required|unique:genre_films',
        // ]);

        $rules = [
            'kategori' => 'required|unique:genre_films',
        ];

        $messages = [
            'kategori.required' => 'kategori harus di isi!',
            'kategori.unique' => 'kategori tidak boleh sama!',
        ];

        // validasi
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::error('Oops!', 'data yang anda input ada kesalahan')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }
        $genres = new genre_film();
        $genres-> kategori = $request-> kategori;
        $genres-> save();
        Alert::success('Done','Data Berhasil Di Buat')-> autoClose(2000);
        return redirect()->route('genre.index');
    }

    public function show($id)
    {
        $genres = genre_film::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kategori' => 'required|',
        ]);
        $genres = genre_film::findOrFail($id);
        $genres-> kategori = $request-> kategori;
        $genres-> save();
        Alert::success('Done','Data Berhasil Di edit');
        return redirect()->route('genre.index');
    }

    public function destroy($id)
    {
        // $genres = genre_film::findOrFail($id);
        // $genres-> delete();

        if(genre_film::destroy($id))return redirect()->back();
        return redirect()->route('genre.index');

    }

}

