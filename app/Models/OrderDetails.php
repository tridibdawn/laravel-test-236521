<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = "orderdetails";
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'orderNumber');
    }

    public function productDetails()
    {
        return $this->belongsTo('App\Models\Product', 'productCode');
    }
}
