<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'active' => 'required',
            'stock' => 'required',
            'quantity' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'description.required' => 'La descripción es requerida',
            'price.required' => 'El precio es requerido',
            'category_id.required' => 'La categoría es requerida',
            'active.required' => 'El estado es requerido',
            'stock.required' => 'El stock es requerido',
            'quantity.required' => 'La cantidad es requerida',
        ];
    }
}
