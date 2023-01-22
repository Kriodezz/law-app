<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\Application\AnswerRequest;
use App\Models\Application;

class UpdateAnswerController extends BaseController
{
    public function __invoke(AnswerRequest $request, Application $application)
    {
        $data = $request->validated();
        $this->service->update($data, $application);

        return redirect()->route('application.show', $application->id);
    }
}
