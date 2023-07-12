<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ItemCardsRequest extends FormRequest
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
            'barcode' => 'required|unique:item_cards,barcode,'.$id,
            'name' => 'required',
            'image' => 'image',
            'item_type' => 'required',
            'item_categories_id' => 'required',
            'uom_id' => 'required',
            'has_retailunit' => 'required',
            'price' => 'required_with:uom_id',
            'wholesale_price' => 'required_with:uom_id',
            'half_wholesale_price' => 'required_with:uom_id',
            'cost_price' => 'required_with:uom_id',
            'retail_uom_id' => 'required_if:has_retailunit,1',
            'retail_uom_quantity_to_parent' => 'required_if:has_retailunit,1',
            'retail_price' => 'required_with:retail_uom_id',
            'half_wholesale_retail_price' => 'required_with:retail_uom_id',
            'wholesale_price_retail' => 'required_with:retail_uom_id',
            'retail_cost_price' => 'required_with:retail_uom_id',
        ];
    }
}
