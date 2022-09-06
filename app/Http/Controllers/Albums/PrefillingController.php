<?php

namespace App\Http\Controllers\Albums;

use App\Components\HttpClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Http\Requests\PrefillingRequest;
use Illuminate\Http\Request;

class PrefillingController extends BaseController
{
    public function __invoke(PrefillingRequest $request)
    {
        $data = $request->validated();
        $url = 'https://ws.audioscrobbler.com/2.0/?method=album.search&album=' . $data['title'] . '&api_key=9e2aa00dc890367c537023061b1a455c&format=json&limit=500';
        $prefillingRequest = new HttpClient($url);
        $response = json_decode($prefillingRequest->client->request('GET')->getBody()->getContents());
        $albums = $response->results->albummatches->album;

        return view('albums.prefilling', compact('albums', 'data'));

    }
}
