<?php

namespace App\Http\Controllers;

use App\Category;
use App\Group;
use App\Http\Handle\MedicineHandler\DeleteMedicine;
use App\Http\Handle\MedicineHandler\GetMedicineNameByManufacturer;
use App\Http\Handle\MedicineHandler\SaveMedicine;
use App\Http\Requests\MedicineRequest;
use App\Manufacturer;
use App\Medicine;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicineController extends Controller
{
    public function index()
    {
        $data['medicines'] = Medicine::with('group', 'category', 'manufacturer', 'unit')->orderBy('id','desc')->paginate();
        return view('medicine.list', $data);
    }

    public function create()
    {
        $data['medicine'] = null;
        $data['groups'] = Group::pluck('name', 'id');
        $data['categories'] = Category::pluck('name', 'id');
        $data['manufacturers'] = Manufacturer::pluck('name', 'id');
        $data['units'] = Unit::pluck('name', 'id');
        return view('medicine.create_update', $data);
    }

    public function store(MedicineRequest $medicineRequest)
    {
        if ((new SaveMedicine($medicineRequest))->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Stored Successfully!!',
            ]);
        }
        Session::flash('alert-danger', 'Data Store Failed!!');
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data['medicine'] = Medicine::find($id);
        $data['groups'] = Group::pluck('name', 'id');
        $data['categories'] = Category::pluck('name', 'id');
        $data['manufacturers'] = Manufacturer::pluck('name', 'id');
        $data['units'] = Unit::pluck('name', 'id');
        return view('medicine.create_update', $data);
    }

    public function delete(Request $request)
    {
        if ((new DeleteMedicine($request))->delete()) {
            Session::flash('alert-danger', 'Data Delete Successfully!!');
            return redirect('medicine/list');
        }
        Session::flash('alert-danger', 'Data Delete Failed!!');
        return redirect()->back();
    }

    public function getMedicineNameByManufacturer(Request $request)
    {
        $data = (new GetMedicineNameByManufacturer($request))->get();
        echo $data;
        exit;
    }

    public function getMedicineHtml(Request $request)
    {
        $data['index'] = $request->index;
        $data['units'] = Unit::pluck('name', 'id');
        $data['manufacturers'] = Manufacturer::pluck('name', 'id');
        $view = view('medicine.medicine-html', $data);
        $view = $view->render();
        echo $view;
        exit;
    }
}
