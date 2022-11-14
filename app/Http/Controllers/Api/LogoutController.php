<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (!$token = auth()->guard('api')->attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau Password Anda salah',
            ], 401);
        }

        $users = User::findOrFail(auth()->guard('api')->user()->id);
        $users->status = 'aktif';
        $users->save();

        //if auth success
        return response()->json([
            'success' => true,
            'data' => auth()->guard('api')->user(),
            'status' => $users->status,
            'token' => $token,
        ], 200);
    }
}
