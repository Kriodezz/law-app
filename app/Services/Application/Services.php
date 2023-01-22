<?php

namespace App\Services\Application;

use App\Models\Application;
use Illuminate\Support\Facades\Storage;

class Services
{
    public function store($data)
    {
        if (isset($data['image'])) {
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        Application::create($data);
    }

    public function update($data, $application)
    {
        if (isset($data['image'])) {
            Storage::disk('public')->delete('images', $application->image);
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
        }
        $application->update($data);
    }
}
