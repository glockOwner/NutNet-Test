<?php

namespace App\Http\Controllers\Albums;

use App\Components\HttpClient;
use App\Http\Controllers\Controller;
use App\Http\Requests\PrefillingStoreRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class PrefillingUpdateController extends BaseController
{
    public function __invoke(PrefillingStoreRequest $request, Album $album)
    {
        $data = $request->validated();
        $url = 'http://ws.audioscrobbler.com/2.0/?method=album.getinfo&api_key=9e2aa00dc890367c537023061b1a455c&artist=' . $data['songwriter'] . '&album=' . $data['title'] . '&format=json';
        $newprefillingRequest = new HttpClient($url);
        $response = $newprefillingRequest->client->request('GET');
        $albumData = json_decode($response->getBody()->getContents());
        $text = '#text';
        $data['cover'] = $albumData->album->image[2]->$text;
        $data['description'] = '';
        $data['is_api'] = 1;
        foreach ($albumData->album->tags->tag as $tag)
        {
            $data['description'] = $data['description'] . $tag->name . ', ';
        }
        $this->service->update($data, $album);
        return redirect()->route('albums.index');
    }
}
