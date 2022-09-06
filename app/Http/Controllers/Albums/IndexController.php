<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $albums = Album::paginate(10);
        return view('albums.index', compact('albums'));
    }
}
