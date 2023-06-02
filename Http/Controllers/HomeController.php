<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;
use App\Models\Song;

class HomeController extends BaseController
{
public function home()
{
    if(!Session::has('user_id')){
        return redirect('login');
    }
return view('home');

}

public function profile()
{
    if(!Session::has('user_id')){
        return redirect('login');
    }
    $user = User::find(Session::get('user_id'));
    $songs = $user->songs;
    # parse each content that is a json string
    foreach($songs as $song) {
        $song->content = json_decode($song->content);
    }
    return view('profile')
        ->with('user', $user)->with('songs', $songs);
}


public function search_spotify()
{
    
    if(!Session::has('user_id')){
        exit;
    }
    $client_id =     "d4c860fba30d49e5ad6cce24a046379b";
    $client_secret = "5174c572bd624d8588ce342797b766a4";

    // ACCESS TOKEN
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token' );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    # Eseguo la POST
    curl_setopt($ch, CURLOPT_POST, 1);
    # Setto body e header della POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, 'grant_type=client_credentials'); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 
    $token=json_decode(curl_exec($ch), true);
    curl_close($ch);    

    // QUERY EFFETTIVA
    $query = urlencode(Request::get("q"));
    $url = 'https://api.spotify.com/v1/search?type=track&q='.$query;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    # Imposto il token
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'])); 
    $res=curl_exec($ch);
    curl_close($ch);

    return $res;
}

public function save_song()
{
    if(!Session::has('user_id')){
        return ['ok' => false];

    }

    # skip if the song is already saved by the user
    if (Song::where('song_id', Request::post('id'))->where('user', Session::get('user_id'))->first()) {
        return ['ok' => true];
    }

    $song_id = Request::post('id');
    $song_title = Request::post('title');
    $song_artist = Request::post('artist');
    $song_duration = Request::post('duration');
    $song_popularity = Request::post('popularity');
    $song_image = Request::post('image');
    $user_id = Session::get('user_id');

    $song = new Song;
    $song->song_id = $song_id;
    $song->content = json_encode([
        'id' => $song_id,
        'title' => $song_title,
        'artist' => $song_artist,
        'duration' => $song_duration,
        'popularity' => $song_popularity,
        'image' => $song_image
    ]);
    $song->user = $user_id;
    $song->save();
    

    return ['ok' => true];
}

}