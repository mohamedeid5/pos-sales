<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TreasuryCreateRequest extends FormRequest
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

        $id = request('id');

        return [
            'name' => 'required|unique:treasuries,name,'.$id,
            'is_master' => 'required|integer|in:1,0',
            'status' => 'required|integer|in:1,0',
            'last_exchange_receipt' => 'required|numeric',
            'last_collection_receipt' => 'required|numeric',
        ];
    }
}
