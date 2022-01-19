<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseMedicineRequest extends FormRequest
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
