<?php
namespace App\Http\Handle\GroupHandler;

use App\Group;
use App\Http\Handle\Interfaces\SaveInterface;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SaveGroup implements SaveInterface
{
    private $request;

    public function __construct($request)
    {
        $this->request= $request;
    }
    public function save()
    {
        try{
            DB::beginTransaction();
            $id = $this->request->id ?? null;
            $group = Group::findOrNew($id);
            $group->name = $this->request->name;
            $group->save();
            DB::commit();
            return true;
        }catch (Exception $exception){
            DB::rollBack();
            return false;
        }
    }
}