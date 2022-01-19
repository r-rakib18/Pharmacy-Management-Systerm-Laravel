<?php

namespace App\Http\Handle\PurchaseHandler;

use App\Http\Handle\Interfaces\SaveInterface;
use App\purchase;
use App\purchaseDetails;
use App\StockTransaction;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class SavePurchase implements SaveInterface
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
            $purchase = Purchase::findOrNew($id);
            $purchase->manufacturer_id = $this->request->manufacturer_id;
            $purchase->purchase_date = $this->request->purchase_date;
            $purchase->invoice_no = $this->request->invoice_no;
            $purchase->payment_type = $this->request->payment_type;
            $purchase->save();
            $details = $this->purchaseDetails();
            $purchase->purchaseDetails()->createMany($details);
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return false;
        }

    }

    public function purchaseDetails()
    {
        $details = [];
        foreach ($this->request->medicine_id as $key => $value) {
            $details[$key]['medicine_id'] = $this->request->medicine_id[$key];
            $details[$key]['batch'] = $this->request->batch[$key];
            $details[$key]['expire_date'] = $this->request->expire_date[$key];
            $details[$key]['unit_id'] = $this->request->unit_id[$key];
            $details[$key]['quantity'] = $this->request->quantity[$key];
            $details[$key]['manufacture_price'] = $this->request->manufacture_price[$key];
            $details[$key]['retail_price'] = $this->request->retail_price[$key];
            $details[$key]['total'] = $this->request->total[$key];

            /* if new purchase then update transaction table */
            $lastBalance = StockTransaction::where('medicine_id', $this->request->medicine_id[$key])->orderBy('id', 'desc')->first();
            if ($lastBalance) {
                $lastBalance->balance = ($lastBalance->balance + $this->request->quantity[$key]);
                $lastBalance->save();
            }
        }
        return $details;
    }

}