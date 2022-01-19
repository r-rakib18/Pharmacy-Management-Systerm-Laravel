<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicineSale extends Model
{
    protected $table ='medicine_sales';
    protected $fillable =[
        'id',
        'medicine_id',
        'unit_id',
        'quantity',
        'price',
        'total_price',
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id')->withDefault();
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id')->withDefault();
    }
}
