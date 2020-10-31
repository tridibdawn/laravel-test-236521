<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $primaryKey = "productCode";
    public $incrementing = false;
    protected $guarded = [];

    public function productLine()
    {
        return $this->belongsTo('App\Models\ProductLine', 'productLine');
    }
}
