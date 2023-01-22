<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;

class DestroyController extends Controller
{
    public function __invoke(Application $application)
    {
        $application->delete();

        return redirect()->route('application.index');
    }
}
