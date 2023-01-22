<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function __invoke(Application $application)
    {
        $categories = Category::all();
        $imageExists = strpos(Storage::url($application->image), 'image');

        return view('application.edit', compact('application', 'categories', 'imageExists'));
    }
}
