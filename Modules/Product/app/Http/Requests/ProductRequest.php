<?php

namespace Modules\Product\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg,webp,jfif,avif|max:6000',
            'title_az' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'description_az' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
