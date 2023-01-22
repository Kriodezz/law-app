<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class ShowController extends Controller
{
    public function __invoke(Application $application)
    {
        $imageExists = strpos(Storage::url($application->image), 'image');

        return view('application.show', compact('application', 'imageExists'));
    }
}
