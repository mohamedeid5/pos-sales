<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountsRequest extends FormRequest
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
            'is_parent' => 'required',
            'account_types_id' => 'required',
            'parent_account_id' => 'required_if:is_parent,0',
            'start_balance_status' => 'required|in:1,2,3',
            'start_balance' => 'required',
            'notes' => 'required',
        ];
    }
}
