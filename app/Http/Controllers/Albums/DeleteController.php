<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class DeleteController extends BaseController
{
    public function __invoke(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index');
    }
}
