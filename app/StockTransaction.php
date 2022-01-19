<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockTransaction extends Model
{
    protected $table = 'stock_transactions';
    protected $fillable = [
        'id',
        'sale_id',
        'medicine_id',
        'stock',
        'sale_qty',
        'balance',
        'purchase_id',
        'created_at',
        'updated_at'
    ];
}
