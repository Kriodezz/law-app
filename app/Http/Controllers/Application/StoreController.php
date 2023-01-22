<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\Application\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['client'] = auth()->user()->id;
        $this->service->store($data);

        return redirect()->route('application.index');

    }
}
