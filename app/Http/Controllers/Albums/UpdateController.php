<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateController extends BaseController
{
    public function __invoke(AlbumRequest $request, Album $album)
    {
        $data = $request->validated();
        $data['cover'] = $this->service->uploadImg($request);
        $message = $this->service->update($data, $album);
        $album->fresh();
        $message = $message . ' Новое название: ' . $album->title . ' Новый исполнитель: ' . $album->songwriter . ' Новое описание: ' . $album->description . 'Новый путь к обложке: ' . $album->cover;
        Log::channel('album_update_log')->info($message);

        return redirect()->route('albums.index');
    }
}
