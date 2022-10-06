<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\movie;


class MovieController extends Controller
{
    public function allMovie(){
        $movies = movie::all();
        $response = [
            'success' => 'true',
            'massage' => 'berhasil',
            'data' => $movies,
            'status' => 200,
        ];
        return response()->json($response);
    }

    public function singleMovie($id){
        $movies = movie::find($id);
        if ($movies) {
            $response = [
                'success' => 'true',
                'massage' => 'data berhasil ditemukan',
                'data' => $movies,
                'status' => 200,
            ];
        }
        else {
            $response = [
                'success' => 'false',
                'massage' => 'data tidak berhasil ditemukan',
                'status' => 404,
            ];
        }
        return response()->json($response);
    }
}
