<?php

namespace Modules\Category\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title_az' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'description_az' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',

        ];

        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
    
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
