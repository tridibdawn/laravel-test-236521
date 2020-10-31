<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLine extends Model
{
    protected $table = "productlines";
    protected $primaryKey = "productLine";
    public $incrementing = false;
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'productLine');
    }
}
