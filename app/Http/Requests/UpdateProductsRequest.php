<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
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
            'name' => 'required',
            // 'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'original_price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'subCategory_id' => 'required|integer',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            // 'category_id.required' => 'Category is required',
            'brand_id.required' => 'Brand is required',
            'original_price.required' => 'Original price is required',
            'stock.required' => 'Stock is required',
            'image.mimes' => 'Image must be jpeg,png,jpg,gif,svg,webp',
            'subCategory_id.required' => 'SubCategory is required',
        ];
    }
}
