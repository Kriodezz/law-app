<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\Application\AcceptRequest;
use App\Models\Application;

class AcceptController extends BaseController
{
    public function __invoke(AcceptRequest $request, Application $application)
    {
        $data = $request->validated();
        $this->service->update($data, $application);

        return redirect()->route('application.show', $application->id);
    }
}
