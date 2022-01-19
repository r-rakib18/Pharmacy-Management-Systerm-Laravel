<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchase_master';
    protected $fillable = [
        'id', 'manufacturer_id', 'purchase_date', 'invoice_no', 'payment_type', 'created_at', 'updated_at'
    ];

    public function purchaseDetails()
    {
        return $this->hasMany(PurchaseDetails::class, 'purchase_master_id');
    }

    public function manufacturesDetail()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id')->withDefault();

    }






}
