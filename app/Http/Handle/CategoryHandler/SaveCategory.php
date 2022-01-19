<?php

namespace App\Http\Handle\CategoryHandler;

use App\Category;
use App\Http\Handle\Interfaces\SaveInterface;
use Illuminate\Support\Facades\DB;

class SaveCategory implements SaveInterface
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
            $id = $this->request->id ?? null;
            $category = Category::findOrNew($id);
            $category->name = $this->request->name;
            $category->save();
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollback();
            return false;
        }
    }
}