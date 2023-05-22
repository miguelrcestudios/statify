<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ArtistsController extends Controller
{
    public function getArtists($time_range) {
        session_start();
        $token = $_SESSION['token'];

        $artists = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/me/top/artists?time_range='.$time_range.'&limit=50');
        
        return view('artists')->with(['artists' => json_decode($artists)]); 
    }

    public function getArtist($id_artist) {
        session_start();
        $token = $_SESSION['token'];

        $artist = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/artists/' . $id_artist);
        
        return view('artist')->with(['artist' => json_decode($artist)]); 
    }
}
