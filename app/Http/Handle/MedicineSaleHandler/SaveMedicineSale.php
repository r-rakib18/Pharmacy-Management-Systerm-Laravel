<?php

namespace App\Http\Handle\MedicineSaveHandler;

use App\Http\Handle\Interfaces\SaveInterface;
use App\MedicineSale;
use App\PurchaseDetails;
use App\StockTransaction;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\Http\Handle\MedicineSaleHandler\StockTransactionHandler;

class SaveMedicineSale implements SaveInterface
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
            foreach ($this->request->medicine_id as $key => $value) {
                $checkAlreadySale = MedicineSale::where('medicine_id', $this->request->medicine_id[$key])->orderBy('id', 'desc')->first();

                $id = $this->request->id ?? null;
                $medicine_sale = MedicineSale::findOrNew($id);
                $medicine_sale->medicine_id = $this->request->medicine_id[$key];
                $medicine_sale->unit_id = $this->request->unit_id[$key];
                $medicine_sale->quantity = $this->request->quantity[$key];
                $medicine_sale->price = $this->request->price[$key];
                $medicine_sale->total_price = $this->request->total_price[$key];
                $medicine_sale->save();


                if ($checkAlreadySale) {
                    /* for regular transaction  */
                    $this->regularTransaction($medicine_sale->id, $this->request->medicine_id[$key], $this->request->quantity[$key]);
                } else {
                    /* for first transaction  */
                    $this->firstTransaction($medicine_sale->id, $this->request->medicine_id[$key], $this->request->quantity[$key]);
                }

            }
            DB::commit();
            return true;
        } catch (Exception $exception) {
            DB::rollBack();
            return false;
        }
    }

    public function firstTransaction($saleId, $medicineId, $saleQty)
    {
        $medicinePrimaryStock = PurchaseDetails::where('medicine_id', $medicineId)->get()->sum('quantity');
        $transaction = new StockTransaction();
        $transaction->sale_id = $saleId;
        $transaction->medicine_id = $medicineId;
        $transaction->stock = $medicinePrimaryStock;
        $transaction->sale_qty = $saleQty;
        $transaction->balance = ($medicinePrimaryStock - $saleQty);
        $transaction->save();
        return true;
    }

    public function regularTransaction($saleId, $medicineId, $saleQty)
    {
        $transactionBalance = StockTransaction::where('medicine_id', $medicineId)->orderBy('id', 'desc')->first();
        $transaction = new StockTransaction();
        $transaction->sale_id = $saleId;
        $transaction->medicine_id = $medicineId;
        $transaction->stock = $transactionBalance->balance;
        $transaction->sale_qty = $saleQty;
        $transaction->balance = ($transactionBalance->balance - $saleQty);
        $transaction->save();
        return true;
    }


}