<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:product_types,name',
            'slug' => 'required',
            'image' => 'required|image',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Product type name is required',
            'name.unique' => 'Product type name already exists',
            'slug.required' => 'Product type slug is required',
            'image.required' => 'Product type image is required',
            'image.image' => 'Product type image must be an image',
        ];
    }
}
