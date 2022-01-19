<?php

namespace App\Http\Handle\MedicineHandler;


use App\Http\Handle\Interfaces\DeleteInterface;
use App\Medicine;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class DeleteMedicine implements DeleteInterface
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function delete()
    {
        try{
            DB::beginTransaction();
            $id = $this->request->id;
            $medicine = Medicine::find($id);
            $medicine->delete();
            DB::commit();
            return true;
        }catch (Exception $exception){
            DB::rollBack();
                return false;
        }
    }

}