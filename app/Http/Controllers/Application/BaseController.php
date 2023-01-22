<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Services\Application\Services;

class BaseController extends Controller
{
    public $service;

    public function __construct(Services $service)
    {
        $this->service = $service;
    }
}
