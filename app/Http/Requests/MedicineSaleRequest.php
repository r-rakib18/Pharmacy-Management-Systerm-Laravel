<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineSaleRequest extends FormRequest
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

    public function messages()
    {
        return [
            'medicine_id.*.required' => 'Medicine Is Required',
            'unit_id.*.required' => 'Unit Is Required',
            'quantity.*.required' => 'Quantity Is Required',
            'price.*.required' => 'Price Is Required',
            'total_price.*.required' => 'Total Price Is Required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'medicine_id.*' => 'required',
            'unit_id.*' => 'required',
            'quantity.*' => 'required',
            'price.*' => 'required',
            'total_price.*' => 'required',
        ];
    }
}
