<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\MedicineSale;
use App\PurchaseDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function stock()
    {
        return view('reports.stock');
    }

    public function stockReport(Request $request)
    {
        $month = date('m', strtotime($request->month));
        $query = Medicine::with('purchase', 'transaction');
        $query->whereHas('transaction', function ($query) use ($month) {
            $query->whereMonth('created_at', $month);
        });
        $data['results'] = $query->get();
        return view('reports.stock', $data);
    }

    public function dailySale()
    {
        return view('reports.daily_sale');
    }

    public function dailySaleReport(Request $request)
    {
        $date = date('Y-m-d', strtotime($request->date));
        $data['daily_sales'] = MedicineSale::with('medicine')->whereDate('created_at', $date)->get()->groupBy('medicine_id');
        return view('reports.daily_sale', $data);

    }


//    public function dailySaleReport(Request $request)
//    {
//        $date = date('d', strtotime($request->date));
////        return $date;
////        $query = MedicineSale::where('medicine');
////        return $qry;
//        $query = MedicineSale::all();
//        $query->where('medicine_id','medicine.id',function ($query) use ($date){
//            $query->whereDay('created_at', $date)->get();
//        });
////        return $qry;
//        $data['daily_sales'] = $query;
//        return $data;
////        return view('reports.daily_sale', $data);
//    }
}
