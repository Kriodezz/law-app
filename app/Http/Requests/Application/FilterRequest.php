<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'client' => 'integer|exists:users,id',
            'lawyer' => 'integer|exists:users,id',
            'category_id' => 'nullable|integer|exists:categories,id',
            'for_one_lawyer' => 'integer|exists:users,id',
            'for_one_client' => 'integer|exists:users,id',
            'created_at_from' => 'nullable|string',
            'created_at_to' => 'nullable|string',
        ];
    }
}
