<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\SongsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home')->name('home');
Route::get('login', [SpotifyController::class, 'login'])->name('login');
Route::get('profile', [SpotifyController::class, 'getUser'])->name('profile');
Route::get('artists/{time_range}', [ArtistsController::class, 'getArtists'])->name('artists');
Route::get('artist/{id_artist}', [ArtistsController::class, 'getArtist'])->name('artist');
Route::get('songs/{time_range}', [SongsController::class, 'getSongs'])->name('songs');
Route::get('song/{id_song}', [SongsController::class, 'getSong'])->name('song');