<?php
namespace App\Http\Handle\UnitHandler;

use App\Http\Handle\Interfaces\SaveInterface;
use App\Unit;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SaveUnit implements SaveInterface
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
            $unit = Unit::findOrNew($id);
            $unit->name = $this->request->name;
            $unit->save();
            DB::commit();
            return true;
        }catch (Exception $exception){
            DB::rollBack();
            return false;
        }
    }

}