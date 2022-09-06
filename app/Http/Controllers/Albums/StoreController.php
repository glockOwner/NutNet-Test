<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use Illuminate\Http\Request;

class StoreController extends BaseController
{
    public function __invoke(AlbumRequest $request)
    {
        $data = $request->validated();
        $data['cover'] = $this->service->uploadImg($request);
        $this->service->store($data);
        return redirect()->route('albums.index');
    }
}
