<?php
/**
 * Created by PhpStorm.
 * User: Mar babu
 * Date: 1/22/2020
 * Time: 9:55 PM
 */

namespace App\Http\Handle\MedicineHandler;


use App\Medicine;

class GetMedicineNameByManufacturer
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function get()
    {
        $manufacturer_id = $this->request->manufacturer_id;
        $medicines = Medicine::where('manufacturer_id', $manufacturer_id)->get();
        $html = '';
        $html .= '<option value="">Select Medicine</option>';
        foreach ($medicines as $medicine) {
            $html .= '<option value="' . $medicine->id . '">' . $medicine->medicine_name . '</option>';
        }
        return $html;

    }
}