<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetails extends Model
{
    protected $table = 'purchase_details';
    protected $fillable = [
        'id', 'purchase_master_id', 'medicine_id', 'batch', 'expire_date', 'unit_id', 'quantity', 'manufacture_price', 'retail_price', 'total', 'created_at', 'updated_at'
    ];

    public function purchase_master_data()
    {
        return $this->belongsTo(Purchase::class, 'purchase_master_id')->withDefault();
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id')->withDefault();
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id')->withDefault();
    }
}
