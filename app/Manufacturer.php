<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    protected $table= 'manufacturers';
    protected $fillable =[
      'name'
    ];
}
