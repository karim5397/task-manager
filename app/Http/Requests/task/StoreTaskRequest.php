<?php

namespace App\Http\Requests\task;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'=>"required|string|max:255",
            'description'=>"required|string",
            'due_date'=>"required|date|date_format:Y-m-d|after_or_equals:today",
        ];
    }
    public function messages(): array
    {
        return [
            'title.required'=>"The title field is required",
            'description.required'=>"The description field is required",
            'due_date.required'=>"The due date field is required",
        ];
    }
}
