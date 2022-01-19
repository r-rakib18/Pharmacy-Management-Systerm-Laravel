<?php
namespace App\Http\Handle\ManufacturerHandler;

use App\Manufacturer;
use App\Http\Handle\Interfaces\SaveInterface;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SaveManufacturer implements SaveInterface
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function save()
    {
        try{
            DB::beginTransaction();
            $id = $this->request->id ?? null;
            $manufacturer = Manufacturer::findOrNew($id);
            $manufacturer->name = $this->request->name;
            $manufacturer->save();
            DB::commit();
            return true;
        }catch (Exception $exception){
            DB::rollBack();
            return false;
        }
    }

}