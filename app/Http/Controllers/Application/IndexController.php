<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Filters\ApplicationFilter;
use App\Http\Requests\Application\FilterRequest;
use App\Models\Application;
use App\Models\Category;
use function view;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $categories = Category::all();

        if (empty($data)) {
            if (auth()->user()->role == 1) {
                $data['for_one_lawyer'] = auth()->user()->id;
            } elseif(auth()->user()->role == 2) {
                $data['for_one_client'] = auth()->user()->id;
            }
        }
        $filter = app()->make(ApplicationFilter::class, ['queryParams' => array_filter($data)]);
        $applications = Application::filter($filter)->get();

        return view('application.index', compact('applications', 'categories'));
    }
}
