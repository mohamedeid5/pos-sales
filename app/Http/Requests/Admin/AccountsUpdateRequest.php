<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountsUpdateRequest extends FormRequest
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
        $id = request('account_id');
        return [
            'name' => 'required|unique:accounts,name,'.$id,
            'is_parent' => 'required',
            'account_types_id' => 'required',
            'parent_account_id' => 'required_if:is_parent,0',
            'notes' => 'required',
        ];
    }
}
