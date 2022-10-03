<?php

namespace App\Http\Controllers;

use App\Models\casting;
use Illuminate\Http\Request;
use Validator;
use Alert;

class CastingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $castings = casting::orderBy('id', 'desc')->get();
        return view('admin.casting.index', compact('castings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.casting.create');
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
            'nama' => 'required',
            'foto' => 'required|image|max:4068',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama harus di isi!',
            'foto.required' => 'foto harus di isi!',
            'foto.image' => 'Foto harus berjenis jpg & png!',
            'foto.image' => 'Foto harus dibawah kapasitas 4068kb!',
            'jenis_kelamin.required' => 'Jenis Kelamin harus di isi!',
            'tanggal_lahir.required' => 'Tanggal Lahir harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!','data yang anda input ada kesalahan')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $castings = new casting();
        $castings->nama = $request->nama;
        $castings->jenis_kelamin = $request->jenis_kelamin;
        $castings->tanggal_lahir = $request->tanggal_lahir;
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/casting/', $name);
            $castings->foto = $name;
        }
        $castings->save();
        Alert::success('Done', 'Data berhasil dibuat')->autoClose(2000);
        return redirect()->route('casting.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $castings = casting::findOrFail($id);
        return view('admin.casting.show', compact('castings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $casting = casting::findOrFail($id);
        return view('admin.casting.edit', compact('casting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
            'foto' => 'nullable|image|max:4068',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
        ];

        $messages = [
            'nama.required' => 'Nama harus di isi!',
            'foto.required' => 'foto harus di isi!',
            'foto.image' => 'Foto harus berjenis jpg & png!',
            'foto.image' => 'Foto harus dibawah kapasitas 4068kb!',
            'jenis_kelamin.required' => 'Jenis Kelamin harus di isi!',
            'tanggal_lahir.required' => 'Tanggal Lahir harus di isi!',
        ];

        $validation = Validator::make($request->all(), $rules, $messages);
        if ($validation->fails()) {
            Alert::error('Oops!','data yang anda input ada kesalahan' )->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $castings = casting::findOrFail($id);
        $castings->nama = $request->nama;
        $castings->jenis_kelamin = $request->jenis_kelamin;
        $castings->tanggal_lahir = $request->tanggal_lahir;
        if ($request->hasFile('foto')) {
            $castings->deleteImage();
            $image = $request->file('foto');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('images/casting/', $name);
            $castings->foto = $name;
        }
        $castings->save();
        Alert::success('Done', 'Data berhasil diedit')->autoClose(2000);
        return redirect()->route('casting.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\casting  $casting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $castings = casting::findOrFail($id);
        // $castings->deleteImage();
        // $castings->delete();
        // return redirect()->route('casting.index');

        if(casting::destroy($id))return redirect()->back();
        return redirect()->route('casting.index');
    }
}
