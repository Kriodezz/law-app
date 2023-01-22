<?php

namespace App\Http\Controllers\Application;

use App\Http\Requests\Application\CommentRequest;
use App\Models\Application;

class UpdateCommentController extends BaseController
{
    public function __invoke(CommentRequest $request, Application $application)
    {
        $data = $request->validated();
        $this->service->update($data, $application);

        return redirect()->route('application.show', $application->id);
    }
}
