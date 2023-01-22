<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'text' => 'required|string',
            'image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'answer' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Необходимо указать название',
            'title.string' => 'Некорректное название',
            'text.required' => 'Заполните текст заявки',
            'text.string' => 'Некорректный текст',
            'image.file' => 'выберите файл',
            'category_id.required' => 'Необходимо указать категорию',
            'category_id.integer' => 'Неверно указана категория',
            'category_id.exists:categories,id' => 'Недопустимая категория',
        ];
    }
}
