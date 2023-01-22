<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\Application\UpdateRequest;
use App\Models\Application;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Application $application)
    {
        $data = $request->validated();
        $this->service->update($data, $application);

        return redirect()->route('application.show', $application->id);
    }
}
