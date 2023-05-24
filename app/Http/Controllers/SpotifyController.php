<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpotifyController extends Controller
{   
    private $clientId;
    private $clientSecret;
    private $redirectUri = 'http://localhost:8000/profile';

    public function __construct(){
        $this->clientId = config('spotify.clientId');
        $this->clientSecret = config('spotify.clientSecret');   
    }

    public function login() {
        $scopes = 'user-read-private user-read-email user-top-read';
        return redirect(
            'https://accounts.spotify.com/authorize' .
                            '?response_type=code' .
                            '&client_id=' . $this->clientId .
                            ($scopes ? '&scope=' . urlencode($scopes) : '') .
                            '&redirect_uri=' . urlencode($this->redirectUri)
        );
    }

    public function getToken()
    {
        $code = $_GET['code'];
       
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret)            
            ])->asForm()
            ->post('https://accounts.spotify.com/api/token', [
            'code' => trim($code),
            'redirect_uri' => $this->redirectUri,
            'grant_type' => 'authorization_code',
        ]);
        
        $_SESSION['token'] = $response;
        
        return $response;

    }
    
    public function getUser() {
        session_start();
        if (isset($_SESSION['token'])) {
            $token = $_SESSION['token'];
        } else {
            $token = $this->getToken();
        }

        $profile = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/me');

        $artists = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/me/top/artists?time_range=short_term&limit=10');

        $songs = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token->json()['access_token']])
            ->get('https://api.spotify.com/v1/me/top/tracks?time_range=short_term&limit=10');
        
        return view('profile')->with(['profile' => json_decode($profile), 'artists' => json_decode($artists), 'songs' => json_decode($songs)]); 
    }
}