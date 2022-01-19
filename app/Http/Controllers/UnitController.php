<?php

namespace App\Http\Controllers;

use App\Http\Handle\UnitHandler\DeleteUnit;
use App\Http\Handle\UnitHandler\SaveUnit;
use App\Http\Requests\UnitRequest;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitController extends Controller
{
    public function index(){
        $data['units'] = Unit::paginate(5);
        return view('unit.list',$data);

    }

    public function create(){
        $data['unit'] = null;
        return view('unit.create_update',$data);
    }

    public function store(UnitRequest $unitRequest){
        if ((new SaveUnit($unitRequest))->save()){
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('unit/list');
        }
        Session::flash('alert-danger', 'Data Store failed!!');
        return redirect('unit/create');

    }

    public function edit(Request $request){
        $unit_id = $request->id;
        $data['unit'] = Unit::find($unit_id);
        return view('unit/create_update', $data);

    }

    public function delete(Request $request){
        if ((new DeleteUnit($request))->delete())
        {
            Session::flash('alert-danger', 'Data Deleted Successfully!!');
            return redirect('unit/list');
        }
        Session::flash('alert-success', 'Data Delete failed!!');
        return redirect()->back();
    }

}
