<?php
/**
 * Created by PhpStorm.
 * User: Ab R Rakib
 * Date: 1/17/2020
 * Time: 5:51 AM
 */

namespace App\Http\Handle\ManufacturerHandler;


use App\Http\Handle\Interfaces\DeleteInterface;
use App\Manufacturer;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class DeleteManufacturer implements DeleteInterface
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
            $manufacturer = Manufacturer::find($id);
            $manufacturer->delete();
            DB::commit();
            return true;
        }catch(Exception $exception){
            DB::rollBack();
            return false;
        }
    }

}