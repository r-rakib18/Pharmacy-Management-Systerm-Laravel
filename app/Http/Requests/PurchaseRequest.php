<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseRequest extends FormRequest
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
            'manufacturer_id.required' => 'Manufacture name is required',
            'purchase_date.required' => 'Purchase date is required',
            'invoice_no.required' => 'Invoice no is required',
            'payment_type.required' => 'Payment type is required',
            'medicine_id.*.required' => 'Medicine name is required',
            'batch.*.required' => 'Batch No is required',
            'expire_date.*.required' => 'Expire date is required',
            'unit_id.*.required' => 'Unit is required',
            'quantity.*.required' => 'Quantity is required',
            'manufacture_price.*.required' => 'Manufacture price required',
            'retail_price.*.required' => 'Retail price is required',
            'total.*.required' => ' Total is required',
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
            'manufacturer_id' => 'required',
            'purchase_date' => 'required',
            'invoice_no' => 'required',
            'payment_type' => 'required',
            'medicine_id.*' => 'required',
            'batch.*' => 'required',
            'expire_date.*' => 'required',
            'unit_id.*' => 'required',
            'quantity.*' => 'required',
            'manufacture_price.*' => 'required',
            'retail_price.*' => 'required',
            'total.*' => 'required',
        ];
    }
}
