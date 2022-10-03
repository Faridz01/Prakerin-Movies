<?php

namespace App\Http\Controllers;

use App\Models\tahun_rilis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Alert;

class TahunRilisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tahun_rilis = tahun_rilis::all();
        return view ('admin.tahun_rilis.index', compact('tahun_rilis'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view ('admin.tahun_rilis.create');
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
            'tahun_rilis' => 'required|unique:tahun_rilis|numeric',
        ];

        $messages = [
            'tahun_rilis.required' => 'Tahun harus di isi!',
            'tahun_rilis.unique' => 'Tahun tidak boleh sama!',
            'tahun.numeric' => 'Tahun Harus Berjenis Angka!',
        ];

        // validasi
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            Alert::error('OOPS!', 'Data yang anda input ada kesalahan!')->persistent("Ok");
            return back()->withErrors($validation)->withInput();
        }

        $tahun_rilis = new tahun_rilis();
        $tahun_rilis->tahun_rilis = $request->tahun_rilis;
        $tahun_rilis->save();
        Alert::success('Done', 'Data Berhasil Di Buat')->autoClose(3000);
        return redirect()->route('tahun_rilis.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tahun_rilis  $tahun_rilis
     * @return \Illuminate\Http\Response
     */
    public function show(tahun_rilis $tahun_rilis)
    {
        $tahun_rilis = tahun_rilis::findOrFail($id);
        return view ('admin.tahun_rilis.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tahun_rilis  $tahun_rilis
     * @return \Illuminate\Http\Response
     */
    public function edit(tahun_rilis $tahun_rilis)
    {
        $tahun_rilis = tahun_rilis::findOrFail($id);
        return view ('admin.tahun_rilis.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tahun_rilis  $tahun_rilis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tahun_rilis $tahun_rilis)
    {
        $rules = [
            'tahun_rilis' => 'required|unique:tahun_rilis|numeric',
        ];

        $messages = [
            'tahun_rilis.required' => 'Tahun harus di isi!',
            'tahun.numeric' => 'Tahun Harus Berjenis Angka!',
        ];

        $validated = $request->validate([
            'tahun_rilis' => 'required|unique:tahun_rilis',
        ]);
        $tahun_rilis = tahun_rilis::findOrFail($id);
        $tahun_rilis->tahun_rilis = $request->tahun_rilis;
        $tahun_rilis->save();
        Alert::success('Done', 'Data Berhasil Di Edit');
        return redirect()->route('tahun_rilis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tahun_rilis  $tahun_rilis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $tahun_rilis = tahun_rilis::findOrFail($id);
        // $tahun_rilis->delete();
        // Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);
        // return redirect()->route('tahun_rilis.index');

        if(tahun_rilis::destroy($id))return redirect()->back();
        return redirect()->route('tahun_rilis.index');
    }
}
