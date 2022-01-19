<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicines';
    protected $fillable = [
        'id',
        'group_id',
        'category_id',
        'medicine_name',
        'generic_name',
        'manufacturer_id',
        'strength',
        'unit_id',
        'box_size',
        'photo'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id')->withDefault();
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id');
    }

    public function medicineSale()
    {
        return $this->hasOne(MedicineSale::class, 'medicine_id')->withDefault();
    }

    public function transaction()
    {
        return $this->hasMany(StockTransaction::class, 'medicine_id');
    }
    public function purchase()
    {
        return $this->hasMany(PurchaseDetails::class, 'medicine_id');
    }
}
