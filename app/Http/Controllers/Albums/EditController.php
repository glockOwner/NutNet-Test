<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Album $album)
    {
        return view('albums.edit', compact('album'));
    }
}
