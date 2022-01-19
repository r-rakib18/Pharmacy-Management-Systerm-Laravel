<?php

namespace App\Http\Handle\UnitHandler;


use App\Http\Handle\Interfaces\DeleteInterface;
use App\Unit;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class DeleteUnit implements DeleteInterface
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
            $unit = Unit::find($id);
            $unit->delete();
            DB::commit();
            return true;
        }catch(Exception $exception){
            DB::rollBack();
            return false;
        }
    }

}