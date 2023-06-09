<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'system_name' => 'required',
            'image' => 'required|sometimes|image|mimes:png,jpg,jpeg',
            'status' => 'required',
            'address' => 'required',
            'phone' => 'required|numeric',
        ];
    }
}
