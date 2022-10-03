<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class myController extends Controller
{
    //
    public function showAboute()
    {
        return view('about');
    }
}
