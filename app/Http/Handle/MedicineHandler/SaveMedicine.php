<?php

namespace App\Http\Handle\MedicineHandler;

use App\Http\Handle\Interfaces\SaveInterface;
use App\Medicine;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SaveMedicine implements SaveInterface
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function save()
    {
        try {
            DB::beginTransaction();
            foreach ($this->request->medicine_name as $key => $value) {
                $id = $this->request->id ?? null;
                $medicine = Medicine::findOrNew($id);
                $medicine->group_id = $this->request->group_id;
                $medicine->category_id = $this->request->category_id;
                $medicine->medicine_name = $this->request->medicine_name[$key];
                $medicine->generic_name = $this->request->generic_name[$key];
                $medicine->manufacturer_id = $this->request->manufacturer_id[$key];
                $medicine->strength = $this->request->strength[$key];
                $medicine->unit_id = $this->request->unit_id[$key];
                $medicine->box_size = $this->request->box_size[$key];

                /* file/image upload*/
//                if ($this->request->hasFile('photo')) {
//                    $imageName = time() . '.' . $this->request->photo[$key]->getClientOriginalExtension();
//                    $this->request->photo[$key]->move(public_path('images'), $imageName);
//                    $medicine->photo = $imageName;
//                }
                $medicine->save();
            }
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return false;
        }
    }
}