<?php

namespace App\Http\Controllers;

use App\Http\Handle\MedicineSaveHandler\SaveMedicineSale;
use App\Http\Requests\MedicineSaleRequest;
use App\Medicine;
use App\MedicineSale;
use App\PurchaseDetails;
use App\Unit;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MedicineSaleController extends Controller
{
    public function index()
    {
        $data['medicine_sale_list'] = MedicineSale::with('medicine', 'medicine.unit')->orderBy('id', 'desc')->paginate();
        $data['search_column'] = [
            'medicine_id' => 'Medicine',
            'unit_id' => 'Unit',
        ];
        return view('medicine_sale.list', $data);
    }

    public function create()
    {
        $data['medicine_sale'] = null;
        $purchaseMedicines = PurchaseDetails::groupBy('medicine_id')->pluck('medicine_id')->toArray();
        $data['medicines'] = Medicine::whereIn('id', $purchaseMedicines)->pluck('medicine_name', 'id');
        $data['units'] = Unit::pluck('name', 'id');
        return view('medicine_sale.create_update', $data);
    }

    public function store(MedicineSaleRequest $medicineSaleRequest)
    {
//        return (new SaveMedicineSale($medicineSaleRequest))->save();
        if ((new SaveMedicineSale($medicineSaleRequest))->save()) {
            return response()->json([
                'status' => 200,
                'message' => 'Data Stored Successfully!!',
            ]);
        }
        Session::flash('alert-danger', 'Data Store Failed!!');
        return redirect()->back();

    }

    public function getUnitByMedicine(Request $request)
    {
        $medicine_id = $request->medicine_id;
        $medicine = Medicine::findOrFail($medicine_id);
        $unit_id = $medicine->unit_id;
        $unit_name = Unit::find($unit_id);
        $html = '<option value="' . $unit_name->id . '">' . $unit_name->name . '</option>';
        echo $html;
        exit;
    }

    public function getSaleHtml(Request $request)
    {
        $data['index'] = $request->index;
        $data['units'] = Unit::pluck('name', 'id');
        $data['medicines'] = Medicine::pluck('medicine_name', 'id');
        $view = view('medicine_sale.sale-html', $data);
        $view = $view->render();
        echo $view;
        exit;
    }


    public function MedicineSaleSearch(Request $request)
    {
        $search_column = $request->search_column;
        $search_string = $request->search_string;
        $query = MedicineSale::with('medicine', 'medicine.unit');

        if ($search_column == 'medicine_id') {
            $query->whereHas('medicine', function ($query) use ($search_string) {
                $query->where('medicine_name', 'like', '%' . $search_string . '%');
            });
        }
        if ($search_column == 'unit_id') {
            $query->whereHas('medicine.unit', function ($query) use ($search_string) {
                $query->where('name', 'like', '%' . $search_string . '%');
            });
        }


        $data['medicine_sale_list'] = $query->paginate();
        $data['search_column'] = [
            'medicine_id' => 'Medicine',
            'unit_id' => 'Unit',
        ];
        return view('medicine_sale.list', $data);
    }


    public function pdfDownload(Request $request)
    {
        $search_column = $request->search_column;
        $search_string = $request->search_string;
        $query = MedicineSale::with('medicine', 'medicine.unit');

        if ($search_column == 'medicine_id') {
            $query->whereHas('medicine', function ($query) use ($search_string) {
                $query->where('medicine_name', 'like', '%' . $search_string . '%');
            });
        }
        if ($search_column == 'unit_id') {
            $query->whereHas('medicine.unit', function ($query) use ($search_string) {
                $query->where('name', 'like', '%' . $search_string . '%');
            });
        }


        $data['medicine_sale_list'] = $query->paginate();
//        return view('purchase.pdf', $data);

        $pdf = PDF::loadView('medicine_sale.pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('medicine_sale.pdf');
    }
}
