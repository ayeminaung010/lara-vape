<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFrontendRequest extends FormRequest
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
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'banner_image'  => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
            'facebook_url'  => 'required|url',
            'instagram_url' => 'required|url',
        ];
    }
}
