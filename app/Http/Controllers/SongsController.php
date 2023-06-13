<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SongsController extends Controller
{
    public function getSongs($time_range) {
        session_start();
        $token = $_SESSION['token'];

        $songs = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/me/top/tracks?time_range='.$time_range.'&limit=50');
        
        return view('songs')->with(['songs' => json_decode($songs), 'tiempo' => $time_range]); 
    }

    public function getSong($id_song) {
        session_start();
        $token = $_SESSION['token'];

        $song = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/tracks/' . $id_song);
        
        return view('song')->with(['song' => json_decode($song)]); 
    }
}
