<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
        return[
            'group_id.required' => 'Group Is Required',
            'category_id.required' => 'Category Is Required',
            'medicine_name.*.required' => 'Medicine Is Required',
            'generic_name.*.required' => 'Generic Is Required',
            'manufacturer_id.*.required' => 'Manufacturer Is Required',
            'strength.*.required' => 'Strength Is Required',
            'unit_id.*.required' => 'Unit Is Required',
            'box_size.*.required' => 'Box Size Is Required',
            'photo.*.required' => 'File/Photo Is Required',
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
            'group_id' => 'required',
            'category_id' => 'required',
            'medicine_name.*' => 'required',
            'generic_name.*' => 'required',
            'manufacturer_id.*' => 'required',
            'strength.*' => 'required',
            'unit_id.*' => 'required',
            'box_size.*' => 'required',
            'photo.*' => 'required',
        ];
    }
}
