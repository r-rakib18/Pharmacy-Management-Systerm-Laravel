<?php

namespace App\Http\Controllers;

use App\Http\Handle\ManufacturerHandler\DeleteManufacturer;
use App\Http\Handle\ManufacturerHandler\SaveManufacturer;
use App\Http\Requests\ManufacturerRequest;
use App\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ManufacturerController extends Controller
{
    public function index()
    {
        $data['manufacturers'] = Manufacturer::paginate(5);
        return view('manufacturer/list', $data);
    }

    public function create()
    {
        $data['manufacturer'] = null;
        return view('manufacturer/create_update', $data);
    }

    public function store(ManufacturerRequest $manufacturerRequest)
    {
        if ((new SaveManufacturer($manufacturerRequest))->save()){
            Session::flash('alert-success', 'Data Stored Successfully!!');
            return redirect('manufacturer/list');
        }
        Session::flash('alert-danger', 'Data Store failed!!');
        return redirect('manufacturer/create');
    }

    public function edit(Request $request)
    {
        $manufacturer_id = $request->id;
        $data['manufacturer'] = Manufacturer::find($manufacturer_id);
        return view('manufacturer/create_update', $data);
    }

    public function delete(Request $request)
    {
        if ((new DeleteManufacturer($request))->delete())
        {
            Session::flash('alert-danger', 'Data Deleted Successfully!!');
            return redirect('manufacturer/list');
        }
        Session::flash('alert-success', 'Data Delete failed!!');
        return redirect()->back();
    }
}
