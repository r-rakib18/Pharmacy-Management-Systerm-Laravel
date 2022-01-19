<?php

namespace App\Http\Handle\GroupHandler;


use App\Group;
use App\Http\Handle\Interfaces\DeleteInterface;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class DeleteGroup implements DeleteInterface
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
            $group = Group::find($id);
            $group->delete();
            DB::commit();
            return true;
        }catch (Exception $exception){
            DB::rollBack();
            return false;
        }
    }
}