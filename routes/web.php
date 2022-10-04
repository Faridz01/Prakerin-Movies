<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MyController;
use App\Http\Controllers\GenreFilmController;
use App\Http\Controllers\CastingController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\RevewersController;
use App\Http\Controllers\TahunRilisController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/about', function () {
//     return '<h1>Halo</h1>'
//         .'Selamat datang di webapp saya <br>'
//         .'Laravel, emang keren.';
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Login Controller
//  protected $redirectTo = '/Client-area';

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
// Route::group(['middlaware' => ['auth'], 'prefix' => 'client-area'], function (){
//     Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/testmodel', function () {
    $query = Post::all();
    return $query;
});

Route::get('/about', 'MyController@showAboute');

Route::get('/errors', function () {
    return view('403');
});

Route::get('test', function () {
    return view('Hallo');
});
//route admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('profile', function () {
        return view('profile');
    })->name('profile');
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('genre',GenreFilmController::class);
    Route::resource('casting',CastingController::class);
    Route::resource('movie',MovieController::class);
    Route::resource('rivewers',RevewersController::class);
    Route::resource('tahun_rilis',TahunRilisController::class);
});

Route::get('/', [FrontController::class, 'index']);
Route::get('movies', [FrontController::class, 'movies']);
Route::get('movies/{id}', [FrontController::class, 'singleMovie']);
