<?php

namespace App\Http\Controllers\Albums;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Albums\Service;

class BaseController extends Controller
{
    public $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
