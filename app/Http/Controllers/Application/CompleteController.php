<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\Application\CompleteRequest;
use App\Models\Application;

class CompleteController extends BaseController
{
    public function __invoke(CompleteRequest $request, Application $application)
    {
        $data = $request->validated();
        $this->service->update($data, $application);

        return redirect()->route('application.show', $application->id);
    }
}
