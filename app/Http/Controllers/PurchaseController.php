<?php

namespace App\Http\Controllers;

use App\Http\Handle\PurchaseHandler\SavePurchase;
use App\Http\Requests\PurchaseRequest;
use App\Manufacturer;
use App\Medicine;
use App\PurchaseDetails;
use App\Unit;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PurchaseController extends Controller
{
    public function index()
    {
        $data['purchase_list'] = PurchaseDetails::with('purchase_master_data', 'unit', 'medicine.manufacturer')->get();
        $data['search_column'] = [
            'manufacturer_id' => 'Manufacturer',
            'purchase_date' => 'Purchase Date',
            'invoice_no' => 'Invoice No',
            'batch' => 'Batch',
        ];
        return view('purchase.list', $data);
    }

    public function create()
    {
        $data['purchase'] = null;
        $data['manufacturers'] = Manufacturer::pluck('name', 'id');
        $data['units'] = Unit::pluck('name', 'id');
        $data['medicines'] = Medicine::pluck('medicine_name', 'id');
        return view('purchase.create_update', $data);
    }

    public function store(PurchaseRequest $purchaseRequest)
    {
        if ((new SavePurchase($purchaseRequest))->save()) {
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

    public function getPurchaseHtml(Request $request)
    {
        $data['index'] = $request->index;
        $data['units'] = Unit::pluck('name', 'id');
        $data['medicines'] = Medicine::where('manufacturer_id',$request->manufacturer_id)->pluck('medicine_name', 'id');
        $view = view('purchase.purchase-html', $data);
        $view = $view->render();
        echo $view;
        exit;
    }

    public function purchaseSearch(Request $request)
    {
        $search_column = $request->search_column;
        $search_string = $request->search_string;
        $query = PurchaseDetails::with('purchase_master_data', 'unit', 'medicine.manufacturer');

        if ($search_column == 'manufacturer_id') {
            $query->whereHas('medicine.manufacturer', function ($query) use ($search_string) {
                $query->where('name', 'like', '%' . $search_string . '%');
            });
        }
        if ($search_column == 'purchase_date') {
            $query->whereHas('purchase_master_data', function ($query) use ($search_string) {
                $query->where('purchase_date', date('Y-m-d', strtotime($search_string)));
            });
        }

        if ($search_column == 'invoice_no') {
            $query->whereHas('purchase_master_data', function ($query) use ($search_string) {
                $query->where('invoice_no', 'like', '%' . $search_string . '%');
            });
        }
        if ($search_column == 'batch') {
            $query->where('batch', 'like', '%' . $search_string . '%');
        }

        $data['purchase_list'] = $query->get();
        $data['search_column'] = [
            'manufacturer_id' => 'Manufacturer',
            'purchase_date' => 'Purchase Date',
            'invoice_no' => 'Invoice No',
            'batch' => 'Batch',
        ];
        return view('purchase.list', $data);
    }

    public function pdfDownload(Request $request)
    {
        $search_column = $request->search_column;
        $search_string = $request->search_string;
        $query = PurchaseDetails::with('purchase_master_data', 'unit', 'medicine.manufacturer');

        if ($search_column == 'manufacturer_id') {
            $query->whereHas('medicine.manufacturer', function ($query) use ($search_string) {
                $query->where('name', 'like', '%' . $search_string . '%');
            });
        }
        if ($search_column == 'purchase_date') {
            $query->whereHas('purchase_master_data', function ($query) use ($search_string) {
                $query->where('purchase_date', date('Y-m-d', strtotime($search_string)));
            });
        }

        if ($search_column == 'invoice_no') {
            $query->whereHas('purchase_master_data', function ($query) use ($search_string) {
                $query->where('invoice_no', 'like', '%' . $search_string . '%');
            });
        }
        if ($search_column == 'batch') {
            $query->where('batch', 'like', '%' . $search_string . '%');
        }

        $data['purchase_list'] = $query->get();
//        return view('purchase.pdf', $data);

        $pdf = PDF::loadView('purchase.pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->download('purchase.pdf');
    }

}
