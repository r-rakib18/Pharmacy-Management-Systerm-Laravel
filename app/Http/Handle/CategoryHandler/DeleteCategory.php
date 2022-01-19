<?php
/**
 * Created by PhpStorm.
 * User: Ab R Rakib
 * Date: 1/16/2020
 * Time: 7:25 PM
 */

namespace App\Http\Handle\CategoryHandler;

use App\Category;
use App\Http\Handle\Interfaces\DeleteInterface;
use Illuminate\Support\Facades\DB;


class DeleteCategory implements DeleteInterface
{
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function delete()
    {
        try {
            DB::beginTransaction();
            $id = $this->request->id;
            $category = Category::find($id);
            $category->delete();
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollback();
            return false;
        }
    }
}