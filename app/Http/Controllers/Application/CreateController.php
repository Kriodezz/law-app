<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\Category;
use function view;

class CreateController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();

        return view('application.create', compact('categories'));
    }
}
